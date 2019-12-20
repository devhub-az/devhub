<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'body' => 'asd',
                'post_id' => 1,
                'author_id' => 2,
                'created_at' => '2019-07-22 13:39:19',
                'updated_at' => '2019-07-22 13:39:19',
            ),
            1 => 
            array (
                'id' => 2,
                'body' => 'фывфыв',
                'post_id' => 4,
                'author_id' => 2,
                'created_at' => '2019-07-22 16:02:10',
                'updated_at' => '2019-07-22 16:02:10',
            ),
            2 => 
            array (
                'id' => 4,
                'body' => 'фывфыв',
                'post_id' => 7,
                'author_id' => 2,
                'created_at' => '2019-08-01 00:39:42',
                'updated_at' => '2019-08-01 00:39:42',
            ),
            3 => 
            array (
                'id' => 5,
                'body' => 'asdasdasd',
                'post_id' => 13,
                'author_id' => 2,
                'created_at' => '2019-08-03 20:57:33',
                'updated_at' => '2019-08-03 20:57:33',
            ),
            4 => 
            array (
                'id' => 6,
            'body' => '<script>alert(1)</script>',
                'post_id' => 1,
                'author_id' => 2,
                'created_at' => '2019-08-05 19:41:59',
                'updated_at' => '2019-08-05 19:41:59',
            ),
            5 => 
            array (
                'id' => 7,
                'body' => 'sd',
                'post_id' => 42,
                'author_id' => 2,
                'created_at' => '2019-12-01 12:04:35',
                'updated_at' => '2019-12-01 12:04:35',
            ),
        ));
        
        
    }
}