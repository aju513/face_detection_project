<?php

namespace App\Http\Controllers\Api;

use App\Exports\AttendanceExport;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceResource;
use Illuminate\Http\Request;
use App\Models\StudentSubject;
use App\Models\TeacherSubject;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
class AttendanceController extends Controller
{
    /**
     * Mark attendance based on face recognition.
     */
    public function markAttendance(Request $request)
    {
        try {
            // Validate input first
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,webp',
                'teacher_subject_id' => 'required|integer'
            ]);

            // Get the authenticated student
            $student = auth('api')->user()->memberable;

            // Retrieve the student's current subject
            $teacherSubjectId = $request->input('teacher_subject_id');
            $teacherSubject = TeacherSubject::find($teacherSubjectId);

            if (!$teacherSubject) {
                return response()->json(['error' => 'Subject not found'], 404);
            }

            // Check time first - before any potential heavy processing
            $currentTime = Carbon::now('Asia/Kathmandu');
            $startTime = Carbon::createFromFormat('H:i:s', $teacherSubject->start_time, 'Asia/Kathmandu');
            $endTime = Carbon::createFromFormat('H:i:s', $teacherSubject->end_time, 'Asia/Kathmandu');

            // Handle end time that crosses midnight
            if ($endTime->lt($startTime)) {
                $endTime->addDay();
            }

            // Check if current time is within class schedule
            if (!$currentTime->between($startTime, $endTime)) {
                return response()->json(['error' => 'Class is not currently in session'], 403);
            }

            // Check if the student is enrolled in this subject
            $studentSubject = StudentSubject::where('student_id', $student->id)
                ->where('teacher_subject_id', $teacherSubjectId)
                ->first();

            if (!$studentSubject) {
                return response()->json(['error' => 'Student is not enrolled in this subject'], 404);
            }

            // Check if attendance is already marked for today
            $today = $currentTime->toDateString();
            $existingAttendance = Attendance::where('student_subject_id', $studentSubject->id)
                ->where('date', $today)
                ->first();

            if ($existingAttendance) {
                return response()->json(['error' => 'Attendance already marked'], 419);
            }

            // Check student encoding
            $studentEncoding = json_decode($student->encodings);
            if (!$studentEncoding) {
                return response()->json(['error' => 'Student encoding not found'], 404);
            }

            // Send the image to Flask API for encoding
            $flaskUrl = 'http://localhost:5000/get-encoding';
            $response = Http::attach(
                'image',
                $request->file('image')->get(),
                $request->file('image')->getClientOriginalName()
            )->post($flaskUrl);

            if ($response->failed()) {
                return response()->json(['error' => 'Failed to get encoding from Flask API'], 500);
            }

            $flaskResponse = $response->json();
            if (empty($flaskResponse['encoding'])) {
                return response()->json(['error' => 'Not a valid image'], 500);
            }

            $uploadedEncoding = $flaskResponse['encoding'];

            // Compute Euclidean distance to verify identity
            $distance = $this->computeEuclideanDistance($studentEncoding, $uploadedEncoding);
            $threshold = 0.6;
            $isMatch = $distance < $threshold;

            if (!$isMatch) {
                return response()->json(['error' => 'Face not matched'], 401);
            }

            // Mark attendance
            Attendance::create([
                'student_subject_id' => $studentSubject->id,
                'date' => $today,
                'status' => 'present',
            ]);

            return response()->json(['message' => 'Attendance marked successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Compute Euclidean distance between two face encodings.
     */
    private function computeEuclideanDistance(array $encoding1, array $encoding2)
    {
        $distance = 0.0;

        foreach ($encoding1 as $i => $value) {
            $distance += pow($value - $encoding2[$i], 2);
        }

        return sqrt($distance);
    }
    public function getRecentAttendance()
    {
        $attendances = Attendance::whereHas('studentSubject', function ($query) {
            $query->where('student_id', auth('api')->user()->memberable_id);
        })->with('studentSubject.teacherSubject.subject')->get();

        return AttendanceResource::collection($attendances);
    }
    public function getTotalAttendance($id)
    {
        $attendances = Attendance::whereHas('studentSubject', function ($query) use ($id) {
            $query->where('student_id', auth('api')->user()->memberable_id);
        })->get();

        $filename = 'attendance_' . now()->format('Ymd_His') . '.xlsx';
        $filePath = 'attendance/' . $filename;

        if (!\Storage::exists('public/attendance')) {
            \Storage::makeDirectory('public/attendance', 0755, true);
        }

        Excel::store(new AttendanceExport($attendances), $filePath, 'public');

        $downloadUrl = \Storage::url($filePath);

        return response()->json([
            'message' => 'Attendance report generated successfully.',
            'download_url' => url($downloadUrl)
        ], 200);

    }
    // public function downloadAttendance(Request $request)
    // {
    //     $partnerId = auth('api')->user()->memberable_id;
    //     $query = $this->memberAttendanceHistory->where('partner_id', $partnerId)
    //         ->whereIn('member_id', $this->getStaffs());

    //     if ($request->has('days')) {
    //         $days = intval($request->input('days'));
    //         if ($days > 0) {
    //             $query = $query->where('date', '>=', now()->subDays($days));
    //         } else {
    //             return response()->json(['error' => 'Invalid days value specified'], 400);
    //         }
    //     }

    //     $filename = 'attendance_' . now()->format('Ymd_His') . '.xlsx';
    //     $filePath = 'attendance/' . $filename;

    //     if (!\Storage::exists('public/attendance')) {
    //         \Storage::makeDirectory('public/attendance', 0755, true);
    //     }

    //     Excel::store(new AttendanceExport($query), $filePath, 'public');

    //     $downloadUrl = \Storage::url($filePath);

    //     return response()->json([
    //         'message' => 'Attendance report generated successfully.',
    //         'download_url' => url($downloadUrl)
    //     ], 200);
    // }
}
