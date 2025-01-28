<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FlaskHelper;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\StudentResource;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class AuthController extends Controller
{
    protected $model, $student, $memberHelper, $imageHelper;

    public function __construct(User $model, Student $student, ImageHelper $imageHelper)
    {
        $this->model = $model;
        $this->student = $student;
        $this->imageHelper = $imageHelper;
    }

    public function register(RegisterRequest $request)
    {
        $filename = null;
        // Handle photo upload and processing
        if (isset($request->photo) && $request->photo->isValid()) {
            $directory = storage_path('app/public/' . $this->student::IMG_PATH . '/');
            $filename = $this->imageHelper->resizeCropImages(800, 600, $request->photo, $directory);
        }

        // Retrieve encoding from Flask API
        $flaskUrl = env('FLASK_URL') . '/get-encoding'; // Ensure the URL is correct
        $encoding = null;

        if (isset($request->photo) && $request->photo->isValid()) {
            try {
                $response = Http::attach(
                    'image',
                    $request->photo->get(),
                    $request->photo->getClientOriginalName()
                )->post($flaskUrl);

                if ($response->failed()) {
                    \Log::error('Flask API request failed', ['response' => $response->json()]);
                    return response()->json(['status' => false, 'message' => 'Failed to retrieve encoding from Flask API'], 500);
                }

                $flaskResponse = $response->json();
                $encoding = $flaskResponse['encoding'] ?? null;

                if (is_null($encoding)) {
                    return response()->json(['status' => false, 'message' => 'Encoding not found in Flask response'], 500);
                }
            } catch (\Exception $e) {
                \Log::error('Error communicating with Flask API', ['exception' => $e->getMessage()]);
                return response()->json(['status' => false, 'message' => 'Error retrieving encoding from Flask API'], 500);
            }
        }

        // Create student record
        $student = $this->student->create([
            "name" => $request->name,
            "email" => $request->email,
            "photo" => $filename,
            "encodings" => json_encode($encoding)
        ]);

        // Create user record
        $user = $this->model->create([
            "memberable_id" => $student->id,
            "memberable_type" => get_class($student),
            "name" => $request->name,
            "phone_no" => $request->phone,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        // Assign role to the user
        $role = Role::find('3');
        $user->assignRole($role);

        // Generate API token
        $token = $user->createToken("mytoken")->accessToken;

        // Return success response
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => "User registered successfully",
                'token' => $token,
            ]);
        }

        // Return failure response
        return response()->json(['status' => false, 'message' => "Something went wrong"], 500);
    }

    public function login(Request $request)
    {

        $user = $this->model->where('email', $request->email)
            ->where('memberable_type', 'App\Models\Student')
            ->first();
        // dd($user);
        if (!empty($user)) {

            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("mytoken")->accessToken;
                $data = $this->student->findOrFail($user->memberable_id);

                return response()->json([
                    "status" => true,
                    "message" => "Login successful",
                    "token" => $token,
                    "data" => ($data)
                ]);
            } else {

                return response()->json([
                    "status" => false,
                    "message" => "Password didn't match",

                ], 409);
            }
        } else {

            return response()->json([
                "status" => false,
                "message" => "User doesnot exist.",

            ], 404);
        }
    }
    public function logout()
    {

        $token = auth('api')->user()->token();

        $token->revoke();
        return response()->json([
            "status" => true,
            "message" => "User Logged out successfully"
        ]);
    }

}
