<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\CreateAssignmentRequest;
use App\Models\Assignment;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    //
    public function createAssignment(CreateAssignmentRequest $request)
    {
        $data = $request->all();

        $assignment = Assignment::create($data);
        return response()->json(['msg' => 'Created Successfully.']);
    }

    public function getAllAssignments($teacher_subject_id)
    {
        $assignments = Assignment::where("teacher_subject_id", $teacher_subject_id)->get();
        return $assignments;
    }
    public function allAssignmentsOfStudent()
    {
        $student = auth('api')->user()->memberable_id;
        $assignments = Assignment::whereHas('teacherSubject', function ($query) {
            $query->whereHas('studentSubjects', function ($studenQuery) {
                $studenQuery->where('student_id', auth('api')->user()->memberable_id);
            });
        })->with('teacherSubject')->get();
        return $assignments;
        // $studentSubject = StudentSubject::with('teacherSubject.assignments')->where('student_id', $student)->get();
        return $studentSubject;
    }
}
