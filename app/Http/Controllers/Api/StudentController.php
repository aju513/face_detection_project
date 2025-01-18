<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Models\Student;
use App\Models\StudentAttendanceRecord;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
    public function attendance(AttendanceRequest $request)
    {
        if (!$this->matchFace($request)) {
            return response()->json(["message" => 'facedoesnot match']);
        }
        $studentId = auth('api')->user()->memberable_id;

        $date = $request->date;
        $type = "Chekc In";
        $partnerId = $request->partner_id;
        $teacherId = $request->teacher_id;
        $facultyId = $request->faculty_id;
        $parsedDate = Carbon::parse($date)->setTimezone('Asia/Kathmandu');

        $attendance = StudentAttendanceRecord::where('student_id', $studentId)
            ->whereDate('date', $parsedDate->format('Y-m-d'))
            ->where('teacher_id', $teacherId)
            ->where('faculty_id', $facultyId)
            ->first();

        if ($attendance) {
            if (!$attendance->checkin) {
                $attendance->checkin = $parsedDate;
            } else {
                $attendance->checkout = $parsedDate;
            }
            $attendance->save();
            $type = "Check Out";
        } else {
            StudentAttendanceRecord::create([
                'teacher_id' => $teacherId,
                'student_id' => $studentId,
                'faculty_id' => $facultyId,
                'date' => $parsedDate,
                'checkin' => $parsedDate
            ]);
            $type = "Check In";
        }

        return response()->json([
            'message' => 'Attendance recorded successfully',
            'type' => $type
        ]);
    }
    public function matchFace(Request $request)
    {
        try {
            // Validate the uploaded image
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Get the authenticated user's student ID and retrieve the student's encoding
            // $studentId = auth('api')->user()->memberable_id;
            $student = auth('api')->user()->memberable;

            $studentEncoding = json_decode($student->encodings);
            if (!$studentEncoding) {
                return response()->json(['error' => 'Student encoding not found'], 404);
            }

            // Send the image to Flask API to get the encoding
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

            // Compute Euclidean distance between the encodings
            $distance = $this->computeEuclideanDistance($studentEncoding, $uploadedEncoding);

            // Define the threshold for a match
            $threshold = 0.6;

            $isMatch = $distance < $threshold;

            return $isMatch;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Compute Euclidean distance between two face encodings.
     *
     * @param array $encoding1
     * @param array $encoding2
     * @return float
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
