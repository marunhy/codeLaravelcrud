<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendEmailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $emailDetails;

    public function __construct($emailDetails)
    {
        $this->emailDetails = $emailDetails;
    }
}















