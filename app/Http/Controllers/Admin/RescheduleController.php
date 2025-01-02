<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\RescheduleRepository;
use App\UI\RescheduleUI;

class RescheduleController extends Controller
{
    use CrudTrait;
    
    protected $model, $ui, $view, $title;
    public function __construct(RescheduleRepository $model)
    {
        $this->model = $model;
        $this->ui = new RescheduleUI;
        $this->view = "";
        $this->title = "";
    }
}
