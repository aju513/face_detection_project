<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function teacher()
    {
        return Teacher::all();
    }
    public function teacherStudent()
    {
        // auth('api')->user()
        $teacher = Teacher::find(4);
        return $teacher->teacherSubjects;
    }
}
