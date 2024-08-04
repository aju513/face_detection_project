<?php

namespace App\Listeners;

use App\Helpers\ActivityLogHelper;
use App\Notifications\UserLoggedInNotification;
use Illuminate\Auth\Events\Login;


class UserLoggedInListener
{
    private ActivityLogHelper $logHelper;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ActivityLogHelper $logHelper)
    {
        $this->logHelper = $logHelper;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $this->logHelper->loggedIn($event->user);
        $event->user->notify(new UserLoggedInNotification());
    }
}
