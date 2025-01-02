<?php

namespace App\Helpers;

use App\Models\Student;
use App\Models\Teacher;
use Spatie\Permission\Models\Role;

class StudentHelper
{
    protected $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function dropdown()
    {
        return $this->model->memberable()->pluck('name', 'id');
    }

}
