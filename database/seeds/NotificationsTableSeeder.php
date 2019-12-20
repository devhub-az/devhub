<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notifications')->delete();
        
        \DB::table('notifications')->insert(array (
            0 => 
            array (
                'id' => 'a3d84c6c-0ca7-4436-a4bb-2614546c51d5',
                'type' => 'App\\Notifications\\PostNotify',
                'notifiable_type' => 'App\\Models\\User',
                'notifiable_id' => 2,
            'data' => '{"type":"Payla\\u015fma","id":63,"title":"Test 2","body":"<blockquote class=\\"twitter-tweet\\"><p>Sunsets don\'t get much better than this one over <a href=\\"https:\\/\\/twitter.com\\/GrandTetonNPS?ref_src=twsrc%5Etfw\\">@GrandTetonNPS<\\/a>. <a href=\\"https:\\/\\/twitter.com\\/hashtag\\/nature?src=hash&amp;ref_src=twsrc%5Etfw\\">#nature<\\/a> <a href=\\"https:\\/\\/twitter.com\\/hashtag\\/sunset?src=hash&amp;ref_src=twsrc%5Etfw\\">#sunset<\\/a> <a href=\\"http:\\/\\/t.co\\/YuKy2rcjyU\\">pic.twitter.com\\/YuKy2rcjyU<\\/a><\\/p>\\u2014 US Department of the Interior (@Interior) <a href=\\"https:\\/\\/twitter.com\\/Interior\\/status\\/463440424141459456?ref_src=twsrc%5Etfw\\">May 5, 2014<\\/a><\\/blockquote>","creator":"hose1021","profile_image":"","created_at":"2019-12-15T17:14:03.000000Z"}',
                'read_at' => '2019-12-15 21:15:13',
                'created_at' => '2019-12-15 21:14:03',
                'updated_at' => '2019-12-15 21:15:13',
            ),
            1 => 
            array (
                'id' => 'ae5e38f2-b35e-4ec6-9da9-11ded038a38f',
                'type' => 'App\\Notifications\\PostNotify',
                'notifiable_type' => 'App\\Models\\User',
                'notifiable_id' => 2,
                'data' => '{"type":"Payla\\u015fma","id":65,"title":"asdasdasd","body":"<p>asdasdasd<\\/p>","creator":"hose1021","profile_image":"","created_at":"2019-12-15T17:18:50.000000Z"}',
                'read_at' => '2019-12-17 18:41:59',
                'created_at' => '2019-12-15 21:18:50',
                'updated_at' => '2019-12-17 18:41:59',
            ),
            2 => 
            array (
                'id' => 'e6c0107c-aac9-4b47-960b-5e57351582b9',
                'type' => 'App\\Notifications\\PostNotify',
                'notifiable_type' => 'App\\Models\\User',
                'notifiable_id' => 2,
                'data' => '{"type":"Payla\\u015fma","id":64,"title":"TEST 3","body":"","creator":"hose1021","profile_image":"","created_at":"2019-12-15T17:14:58.000000Z"}',
                'read_at' => '2019-12-15 21:15:13',
                'created_at' => '2019-12-15 21:14:58',
                'updated_at' => '2019-12-15 21:15:13',
            ),
        ));
        
        
    }
}