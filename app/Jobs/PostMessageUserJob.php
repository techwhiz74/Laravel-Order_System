<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PostMessageUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    protected $message;
    protected $attachment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId, $message, $attachment)
    {
        $this->userId = $userId;
        $this->message = $message;
        $this->attachment = $attachment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }
}
