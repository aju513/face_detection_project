<?php

namespace App\Providers;

use App\Events\UserCreatedEvent;
use App\Listeners\UserCreatedListener;
use App\Listeners\UserLoggedInListener;
use App\Listeners\UserLoginFailedListener;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Login::class => [
            UserLoggedInListener::class
        ],
        Failed::class => [
            UserLoginFailedListener::class
        ],
        UserCreatedEvent::class => [
            UserCreatedListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
