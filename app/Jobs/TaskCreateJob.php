<?php

namespace App\Jobs;

use App\Mail\SendTaskCreateEmail;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class TaskCreateJob implements ShouldQueue
{
    use Queueable;

    public $task;

    /**
     * Create a new job instance.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->task->user->email)->send(new SendTaskCreateEmail($this->task));
    }
}
