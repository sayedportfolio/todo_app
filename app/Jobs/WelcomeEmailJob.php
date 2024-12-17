<?php

namespace App\Jobs;

use App\Mail\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WelcomeEmailJob implements ShouldQueue
{
    use Queueable, SerializesModels, InteractsWithQueue;

    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {

        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->user->email)->send(new SendWelcomeEmail($this->user));
    }
}
