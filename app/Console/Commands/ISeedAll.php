<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ISeedAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iseed:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command plugin for iseed to seed all databases except migrations table';

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
     * @return mixed
     */
    public function handle()
    {
        $dbName = env('DB_DATABASE');

        $query =  \DB::select("SHOW TABLES WHERE 'Tables_in_${dbName}' NOT LIKE 'migrations'");
        $collection = new \Illuminate\Support\Collection($query);

        $tables = "";
        $collectionArray = $collection->toArray();
        $iteration = 0;
        foreach($collectionArray as $item){
            if( $iteration < (sizeof($collectionArray) - 2)  ){
                $tables .= array_values( (array) $item)[0].",";
            }else{
                $tables .= array_values( (array) $item)[0];
            }
            $iteration++;
        }

        $this->info('Calling iseed for all tables except migrations ...');
        $this->call('iseed', ["tables" => $tables]);
    }
}
