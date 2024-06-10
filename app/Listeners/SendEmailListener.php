<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendEmailJob;

class SendEmailListener implements ShouldQueue
{
    use InteractsWithQueue;


    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        SendEmailJob::dispatch($event->emailDetails);
    }
}
