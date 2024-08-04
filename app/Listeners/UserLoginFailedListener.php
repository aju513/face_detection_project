<?php


namespace App\Listeners;

use App\Helpers\ActivityLogHelper;
use Illuminate\Auth\Events\Failed;


class UserLoginFailedListener
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
    public function handle(Failed $event)
    {
        $this->logHelper->loginFailed($event->credentials);
    }
}
