<?php

namespace App\Helpers;

use App\Models\Subject;
use App\Models\Teacher;
use Spatie\Permission\Models\Role;

class SubjectHelper
{
    protected $model;

    public function __construct(Subject $model)
    {
        $this->model = $model;
    }

    public function dropdown()
    {
        return $this->model->pluck('name', 'id');
    }

}
