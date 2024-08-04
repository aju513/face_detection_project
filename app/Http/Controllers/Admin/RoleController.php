<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\RoleRepository;
use App\UI\RoleUI;

class RoleController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;

    public function __construct(RoleRepository $model)
    {
        $this->model = $model;
        $this->ui = new RoleUI;
        $this->view = "roles";
        $this->title = "Roles";
    }
}
