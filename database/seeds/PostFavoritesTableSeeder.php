<?php

use Illuminate\Database\Seeder;

class PostFavoritesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_favorites')->delete();
        
        \DB::table('post_favorites')->insert(array (
            0 => 
            array (
                'id' => 33,
                'follower_id' => 2,
                'post_id' => 44,
                'created_at' => '2019-08-16 02:40:26',
                'updated_at' => '2019-08-16 02:40:26',
            ),
        ));
        
        
    }
}