<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\ForgotPasswordRequested;
use App\Listeners\HandleForgotPassword;

class OtpServiceProvider extends ServiceProvider
{
    protected $listen = [
        ForgotPasswordRequested::class => [
            HandleForgotPassword::class,
        ],
    ];

    public function boot(): void
    {
    }
}
