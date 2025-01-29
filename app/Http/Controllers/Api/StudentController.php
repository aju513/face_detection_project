<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\EditProfileRequest;
use App\Http\Resources\StudentClassesResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\StudentAttendanceRecord;
use App\Models\StudentSubject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{

    public function classes(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'nullable|string|max:255', // Name can be empty, but must be a string
        ]);

        $name = $request->name ?? '';

        try {
            // Query the model with eager loading and filtering
            $model = StudentSubject::with(['student', 'teacherSubject.subject'])
                ->whereHas('teacherSubject', function ($query) use ($name) {
                    $query->whereHas('subject', function ($subjectQuery) use ($name) {
                        if ($name) {
                            $subjectQuery->where('name', 'like', '%' . $name . '%');
                        }
                    });
                })
                ->where('student_id', auth('api')->user()->memberable_id) // Check if the user is authenticated
                ->get();

            // Return a collection of resources
            return StudentClassesResource::collection($model);

        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json([
                'message' => 'An error occurred while fetching classes.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function classDetails($id)
    {

        $model = TeacherSubject::with('subject', 'teacher')->where('id', $id)->get();
        if (!$model) {
            return response()->json(["msg" => 'not found'], 404);
        }
        return new StudentClassesResource($model);
    }
    public function profile()
    {
        $student = Student::findOrFail(auth('api')->user()->memberable_id);

        return new StudentResource($student);
    }

    public function editProfile(Request $request)
    {
        $data = $request->all();

        $member = Student::find(auth('api')->user()->memberable_id);

        if (isset($data['profile_picture']) && $data['profile_picture']->isValid()) {
            $directory = storage_path('app/public/students/');
            $filename = ImageHelper::resizeCropImages(800, 600, $data['profile_picture'], $directory);
            $data['profile_picture'] = $filename;
        }
        $member->update($data);
        $user = User::find(auth('api')->user()->id);
        if ($user->name != $member->name) {
            $user->update(["name" => $member->name]);
        }
        return response()->json(["message" => "Profile Edited Succesfully.", "profile" => new StudentResource($member)]);
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

            return response()->json(['message' => $isMatch]);
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
