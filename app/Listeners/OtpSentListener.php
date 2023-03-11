<?php

namespace App\Listeners;

use App\Events\OtpSent;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OtpSentListener
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
    public function handle(OtpSent $event)
    {
        try {
            Mail::to($event->user->email)->send(new SendOtpMail($event->code));
        } catch (\Throwable $th) {
            Log::error('Failed to send OTP email to user ' . $event->user->id . ': ' . $th->getMessage());
            session()->flash('error_otp_mail', 'There was an error sending the OTP email. Please try again later.');
        }
    }
}
