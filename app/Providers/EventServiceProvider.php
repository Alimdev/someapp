<?php

namespace App\Providers;

use App\Events\AuthorizationLogEvent;
use App\Jobs\VerifycationJob;
use App\Listeners\AuthorizationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        AuthorizationLogEvent::class => [
            AuthorizationListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            VerifycationJob::class.'@handle',
            fn($job) => $job->handle()
        );
    }
}
