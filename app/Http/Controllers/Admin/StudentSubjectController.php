<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\StudentSubjectRepository;
use App\UI\StudentSubjectUI;

class StudentSubjectController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;
    public function __construct(StudentSubjectRepository $model)
    {
        $this->model = $model;
        $this->ui = new StudentSubjectUI;
        $this->view = "student-subjects";
        $this->title = "Student Subjects";
    }
}
