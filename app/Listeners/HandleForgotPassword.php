<?php

namespace App\Listeners;

use App\Events\ForgotPasswordRequested;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Jobs\SendOtpEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleForgotPassword
{
    public function handle(ForgotPasswordRequested $event)
    {
        $email = $event->email;
        $otp = Str::random(6);
        Cache::put('otp_' . $email, $otp, now()->addMinutes(5));

        SendOtpEmailJob::dispatch($email, $otp);
    }
}
