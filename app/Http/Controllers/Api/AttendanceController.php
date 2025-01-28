<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSubject;
use App\Models\TeacherSubject;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class AttendanceController extends Controller
{
    /**
     * Mark attendance based on face recognition.
     */
    public function markAttendance(Request $request)
    {
        try {
            // Validate the uploaded image
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Get the authenticated student
            $student = auth('api')->user()->memberable;

            // Check if the student has a valid encoding
            $studentEncoding = json_decode($student->encodings);
            if (!$studentEncoding) {
                return response()->json(['error' => 'Student encoding not found'], 404);
            }

            // Send the image to Flask API for encoding
            $flaskUrl = 'http://localhost:5000/get-encoding'; // Replace with your Flask server URL
            $response = Http::attach(
                'image',
                $request->file('image')->get(),
                $request->file('image')->getClientOriginalName()
            )->post($flaskUrl);

            if ($response->failed()) {
                return response()->json(['error' => 'Failed to get encoding from Flask API', 'details' => $response->json()], 500);
            }

            $flaskResponse = $response->json();
            $uploadedEncoding = $flaskResponse['encoding'];

            // Compute Euclidean distance to verify identity
            $distance = $this->computeEuclideanDistance($studentEncoding, $uploadedEncoding);
            $threshold = 0.6;
            $isMatch = $distance < $threshold;

            if (!$isMatch) {
                return response()->json(['message' => 'Face not matched'], 401);
            }

            // Retrieve the student's current subject
            $teacherSubjectId = $request->input('teacher_subject_id');
            $teacherSubject = TeacherSubject::find($teacherSubjectId);

            if (!$teacherSubject) {
                return response()->json(['error' => 'Subject not found'], 404);
            }

            // Check if the current time is within the subject's schedule
            $currentTime = Carbon::now('Asia/Kathmandu');
            $startTime = Carbon::createFromFormat('H:i:s', $teacherSubject->start_time, 'Asia/Kathmandu');
            $endTime = Carbon::createFromFormat('H:i:s', $teacherSubject->end_time, 'Asia/Kathmandu');
            // Check if end time is before start time (this means it's on the next day)
            if ($endTime->lt($startTime)) {
                $endTime->addDay(); // Add one day to end time
            }

            // Get current time in 'Asia/Kathmandu' timezone
            $currentTime = Carbon::now('Asia/Kathmandu');

            // Check if current time is between start and end times
            if (!$currentTime->between($startTime, $endTime)) {
                return response()->json(['message' => 'Attendance cannot be marked outside the scheduled time'], 403);
            }

            // Check if the student is enrolled in this subject
            $studentSubject = StudentSubject::where('student_id', $student->id)
                ->where('teacher_subject_id', $teacherSubjectId)
                ->first();

            if (!$studentSubject) {
                return response()->json(['error' => 'Student is not enrolled in this subject'], 404);
            }

            // Check if attendance is already marked for today
            $today = Carbon::now('Asia/Kathmandu')->toDateString();
            $existingAttendance = Attendance::where('student_subject_id', $studentSubject->id)
                ->where('date', $today)
                ->first();

            if ($existingAttendance) {
                return response()->json(['message' => 'Attendance already marked'], 200);
            }

            // Mark attendance
            Attendance::create([
                'student_subject_id' => $studentSubject->id,
                'date' => $today,
                'status' => 'present', // You can customize status as needed
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
}
