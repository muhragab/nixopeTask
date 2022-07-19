<?php

namespace App\Listeners;

use App\Events\VerifyEmailEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class VerificationUserEmail implements ShouldQueue
{
    /**
     * @var string
     */
    public $connection = 'database';
    /**
     * @var int
     */
    public $delay = 5;

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
     * @param \App\Events\VerifyEmailEvent $event
     * @return void
     */
    public function handle(VerifyEmailEvent $event)
    {
        Log::info('Sending Verify Code to ' . $event->email);
    }
}
