<?php

namespace App\Jobs;

use App\Mail\SendPendingTaskMail;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class PendingTaskJob implements ShouldQueue
{
    use Queueable;

    public $task;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pending_tasks = Task::where(['completed' => 0])->get();
        if ($pending_tasks != null) {
            foreach ($pending_tasks as $task) {
                Mail::to($task->user->email)->send(new SendPendingTaskMail($task));
            }
        }
    }
}
