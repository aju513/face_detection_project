<?php

namespace App\Helpers;

use App\Models\Teacher;
use App\Models\TeacherSubject;
use DB;
use Spatie\Permission\Models\Role;

class TeacherHelper
{
    protected $model;

    public function __construct(Teacher $model)
    {
        $this->model = $model;
    }

    public function dropdown()
    {
        return $this->model->pluck('name', 'id');
    }
    public function teacherDropdown()
    {
        return TeacherSubject::join('teachers', 'teacher_subjects.teacher_id', '=', 'teachers.id')
            ->pluck('teachers.name', 'teacher_subjects.id');
    }


}
