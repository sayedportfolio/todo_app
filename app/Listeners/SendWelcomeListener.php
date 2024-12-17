<?php

namespace App\Listeners;

use App\Events\NewRegistrationEvent;
use App\Jobs\WelcomeEmailJob;
use App\Mail\SendWelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewRegistrationEvent $event): void
    {
        WelcomeEmailJob::dispatch($event->user);
    }
}
