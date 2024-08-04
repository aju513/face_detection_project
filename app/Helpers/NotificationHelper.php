<?php

namespace App\Helpers;

use Illuminate\Notifications\DatabaseNotification;

class NotificationHelper
{
    private DatabaseNotification $model;

    public function __construct(DatabaseNotification $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        return auth()->user()->unreadNotifications()->paginate(10);
    }
}
