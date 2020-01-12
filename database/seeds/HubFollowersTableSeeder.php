<?php

use Illuminate\Database\Seeder;

class HubFollowersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hub_followers')->delete();
        
        \DB::table('hub_followers')->insert(array (
            0 => 
            array (
                'id' => 29,
                'hub_id' => 123,
                'follower_id' => 1,
                'created_at' => '2019-08-19 13:40:05',
                'updated_at' => '2019-08-19 13:40:05',
            ),
            1 => 
            array (
                'id' => 35,
                'hub_id' => 22,
                'follower_id' => 1,
                'created_at' => '2019-08-19 13:44:19',
                'updated_at' => '2019-08-19 13:44:19',
            ),
            2 => 
            array (
                'id' => 57,
                'hub_id' => 12,
                'follower_id' => 1,
                'created_at' => '2019-09-26 17:23:02',
                'updated_at' => '2019-09-26 17:23:02',
            ),
        ));
        
        
    }
}
