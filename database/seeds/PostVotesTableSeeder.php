<?php

use Illuminate\Database\Seeder;

class PostVotesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_votes')->delete();
        
        \DB::table('post_votes')->insert(array (
            0 => 
            array (
                'id' => 115,
                'user_id' => 1,
                'post_id' => 1,
                'status' => 1,
                'created_at' => '2019-08-13 21:25:41',
                'updated_at' => '2019-08-13 21:25:45',
            ),
            1 => 
            array (
                'id' => 116,
                'user_id' => 1,
                'post_id' => 55,
                'status' => 0,
                'created_at' => '2019-08-21 19:17:55',
                'updated_at' => '2019-08-21 19:17:55',
            ),
            2 => 
            array (
                'id' => 117,
                'user_id' => 1,
                'post_id' => 54,
                'status' => 1,
                'created_at' => '2019-08-21 19:18:07',
                'updated_at' => '2019-08-21 19:18:07',
            ),
        ));
        
        
    }
}
