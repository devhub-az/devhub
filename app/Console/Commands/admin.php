<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devhub:role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change User role';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $type  = $this->ask('type?');
        $email = $this->ask('email');
        switch ($type) {
            case 0:
                User::where('email', $email)->update(['type' => 0]);
                break;
            case 1:
                User::where('email', $email)->update(['type' => 1, 'email_verified_at' => \Carbon::now()]);
                break;
            case 2:
                User::where('email', $email)->update(['type' => 2]);
                break;
            case 3:
                User::where('email', $email)->update(['type' => 3]);
                break;
            default:
                break;
        }

        return 'Done';
    }
}
