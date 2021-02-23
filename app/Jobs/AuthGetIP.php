<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AuthGetIP implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $ip;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $ip)
    {
        $this->user = $user;
        $this->ip = $ip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->lastIP = $this->ip;

        $ipInfo = file_get_contents('http://ip-api.com/json/'.$this->ip);
        $ipInfo = json_decode($ipInfo);
        if ($ipInfo->status !== 'fail') {
            $this->user->timezone = $ipInfo->timezone;
            $this->user->save();
        }
    }
}
