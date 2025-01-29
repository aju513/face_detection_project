<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\TeacherSubjectRepository;
use App\UI\TeacherSubjectUI;

class TeacherSubjectController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;
    public function __construct(TeacherSubjectRepository $model)
    {
        $this->model = $model;
        $this->ui = new TeacherSubjectUI;
        $this->view = "teacher-subjects";
        $this->title = "Teacher Subject";
    }
}
