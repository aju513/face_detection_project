<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\AttendanceRepository;
use App\UI\AttendanceUI;

class AttendanceController extends Controller
{
    use CrudTrait;
    
    protected $model, $ui, $view, $title;
    public function __construct(AttendanceRepository $model)
    {
        $this->model = $model;
        $this->ui = new AttendanceUI;
        $this->view = "";
        $this->title = "";
    }
}
