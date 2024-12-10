<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\TeacherRepository;
use App\UI\TeacherUI;

class TeacherController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;
    public function __construct(TeacherRepository $model)
    {
        $this->model = $model;
        $this->ui = new TeacherUI;
        $this->view = "teachers";
        $this->title = "Teacher";
    }
}
