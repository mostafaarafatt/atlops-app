<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Accounts\Events\ResetPasswordCreated;
use Modules\Accounts\Events\VerificationCreated;
use Modules\Accounts\Listeners\SendResetPasswordCode;
use Modules\Accounts\Listeners\SendVerificationCode;

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

        VerificationCreated::class => [
            SendVerificationCode::class,
        ],

        ResetPasswordCreated::class => [
            SendResetPasswordCode::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
