<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class LogActivity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $type;
    protected $user;
    protected $message;
    protected $ip;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ip, $type, $user, $message)
    {
        $this->type = $type;
        $this->user = $user;
        $this->message = $message;
        $this->ip = $ip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        activity()
            ->causedBy($this->user)
            ->withProperties([
                'type' => $this->type,
                'ip' => $this->ip,
                'location' => $this->ip === '127.0.0.1' ? null : $this->getLocation(),
            ])
            ->log($this->message);
    }

    public function getLocation()
    {
        try {
            if (App::environment() === 'production') {
                $ipInfo = json_decode(file_get_contents('http://ip-api.com/json/'.$this->ip));
                if ($ipInfo->status === 'fail') {
                    return null;
                }

                return $ipInfo->city.', '.$ipInfo->regionName.', '.$ipInfo->country;
            }

            return 'Test Location';
        } catch (Exception $e) {
            return null;
        }
    }
}
