<?php

namespace App\Listeners;

use App\Events\TaskCreateEvent;
use App\Jobs\TaskCreateJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TaskCreateListener
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
    public function handle(TaskCreateEvent $event): void
    {
        TaskCreateJob::dispatch($event->task);
    }
}
