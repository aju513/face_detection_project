<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\CrudTrait;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\NotificationRepository;
use App\UI\NotificationUI;

class NotificationController extends Controller
{
    use CrudTrait;

    protected $model, $ui, $view, $title;
    public function __construct(NotificationRepository $model)
    {
        $this->model = $model;
        $this->ui = new NotificationUI;
        $this->view = "notifications";
        $this->title = "Notification";
    }
}
