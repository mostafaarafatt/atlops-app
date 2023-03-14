<?php

namespace App\Listeners;

use App\Events\OtpRegister;
use App\Services\SmsService;

class SendSmsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\OtpSent  $event
     * @return void
     */
    public function handle(OtpRegister $event, SmsService $smsService)
    {
        $respons =  $smsService->send($event->user?->phone, $event->user->name, $event->otp->code);
    }
}
