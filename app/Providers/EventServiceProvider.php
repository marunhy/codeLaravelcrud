<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\SendEmailEvent;
use App\Listeners\SendEmailListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SendEmailEvent::class => [
            SendEmailListener::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();
    }
}
