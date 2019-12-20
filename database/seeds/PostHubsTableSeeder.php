<?php

use Illuminate\Database\Seeder;

class PostHubsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_hubs')->delete();
        
        \DB::table('post_hubs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'posts_id' => 1,
                'hub_id' => 123,
                'created_at' => '2019-07-24 00:27:02',
                'updated_at' => '2019-08-15 18:50:23',
            ),
            1 => 
            array (
                'id' => 2,
                'posts_id' => 1,
                'hub_id' => 130,
                'created_at' => '2019-07-25 21:03:25',
                'updated_at' => '2019-08-15 18:51:28',
            ),
            2 => 
            array (
                'id' => 3,
                'posts_id' => 1,
                'hub_id' => 25,
                'created_at' => '2019-07-25 21:03:29',
                'updated_at' => '2019-07-25 21:03:29',
            ),
            3 => 
            array (
                'id' => 4,
                'posts_id' => 1,
                'hub_id' => 22,
                'created_at' => '2019-07-25 21:03:34',
                'updated_at' => '2019-07-25 21:03:34',
            ),
            4 => 
            array (
                'id' => 5,
                'posts_id' => 1,
                'hub_id' => 45,
                'created_at' => '2019-07-25 21:03:38',
                'updated_at' => '2019-07-25 21:03:38',
            ),
            5 => 
            array (
                'id' => 6,
                'posts_id' => 39,
                'hub_id' => 1,
                'created_at' => '2019-08-01 00:57:56',
                'updated_at' => '2019-08-12 20:18:32',
            ),
            6 => 
            array (
                'id' => 7,
                'posts_id' => 8,
                'hub_id' => 31,
                'created_at' => '2019-08-02 21:00:12',
                'updated_at' => '2019-08-02 21:00:12',
            ),
            7 => 
            array (
                'id' => 8,
                'posts_id' => 54,
                'hub_id' => 12,
                'created_at' => '2019-08-21 13:57:28',
                'updated_at' => '2019-08-21 13:57:49',
            ),
        ));
        
        
    }
}