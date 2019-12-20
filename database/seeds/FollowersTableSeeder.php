<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('followers')->delete();
        
        \DB::table('followers')->insert(array (
            0 => 
            array (
                'id' => 32,
                'leader_id' => 2,
                'follower_id' => 2,
                'created_at' => '2019-08-08 02:37:18',
                'updated_at' => '2019-12-15 18:23:34',
            ),
        ));
        
        
    }
}