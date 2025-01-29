<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\SubjectRepository;
use App\UI\SubjectUI;

class SubjectController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;
    public function __construct(SubjectRepository $model)
    {
        $this->model = $model;
        $this->ui = new SubjectUI;
        $this->view = "subjects";
        $this->title = "Subject";
    }
}
