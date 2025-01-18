<?php

namespace App\Helpers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Spatie\Permission\Models\Role;

class StudentHelper
{
    protected $model, $teacherSubject;

    public function __construct(Student $model, TeacherSubject $teacherSubject)
    {
        $this->model = $model;
        $this->teacherSubject = $teacherSubject;
    }

    public function dropdown()
    {
        return $this->model->pluck('name', 'id');
    }
    public function teacherSubjects()
    {
        $result = [];
        foreach ($this->teacherSubject->get() as $item) {
            $teacherName = $item->teacher->name ?? 'Unknown';
            $subjectName = $item->subject->name ?? 'Unknown';
            $result[$item->id] = "{$teacherName}_{$subjectName}";
        }
        return $result;
    }



}
