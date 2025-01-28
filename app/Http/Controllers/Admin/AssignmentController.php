<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\AssignmentRepository;
use App\UI\AssignmentUI;

class AssignmentController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;
    public function __construct(AssignmentRepository $model)
    {
        $this->model = $model;
        $this->ui = new AssignmentUI;
        $this->view = "assignments";
        $this->title = "Assignment";
    }
}
