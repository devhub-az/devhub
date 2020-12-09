<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DevHubInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devhub:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install DevHub';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->execShellWithPrettyPrint('cp .env.example .env1');
        $this->execShellWithPrettyPrint('composer install');
        $this->execShellWithPrettyPrint('npm install');
        $this->execShellWithPrettyPrint('php artisan key:generate');
        $this->execShellWithPrettyPrint('php artisan migrate --seed');
        $this->execShellWithPrettyPrint('npm run production');
    }

    /**
     * Exec shell with pretty print.
     *
     * @param string $command
     *
     * @return mixed
     */
    public function execShellWithPrettyPrint($command)
    {
        $this->info('---');
        $this->info($command);
        $output = shell_exec($command);
        $this->info($output);
        $this->info('---');
    }
}
