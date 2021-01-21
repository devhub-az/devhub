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
    protected $signature = 'devhub:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make User admin';

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
        $email = $this->ask('email');
        User::where('email', $email)->update(['isAdmin' => 1]);
        return 'Done';
    }
}
