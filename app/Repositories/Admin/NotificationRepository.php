<?php

namespace App\Repositories\Admin;

use App\Models\Notification;
use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;

class NotificationRepository
{
    use CommonRepositoryTrait, CrudRepositoryTrait, SearchRepositoryTrait;

    protected $model;

    public function __construct(Notification $model)
    {
        $this->model = $model;
    }
}
