<?php

namespace App\Helpers;

use App\Models\Teacher;
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

}
