<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\StudentRepository;
use App\UI\StudentUI;

class StudentController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;
    public function __construct(StudentRepository $model)
    {
        $this->model = $model;
        $this->ui = new StudentUI;
        $this->view = "students";
        $this->title = "Students";
    }
}
