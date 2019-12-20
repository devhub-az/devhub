<?php

use Illuminate\Database\Seeder;

class PostsViewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts_views')->delete();
        
        \DB::table('posts_views')->insert(array (
            0 => 
            array (
                'id' => 19,
                'post_id' => 1,
                'title' => 'Let\'s play a little game with Lamoda',
                'url' => 'http://127.0.0.1:8000/post/1',
                'session_id' => '0cEsy7TSYvzVWEzFIMKi33QgD9onS5zzHXK6ty95',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-12 22:04:38',
                'updated_at' => '2019-08-12 22:04:38',
            ),
            1 => 
            array (
                'id' => 20,
                'post_id' => 40,
            'title' => 'PHP-Дайджест № 162 (1 – 12 августа 2019)',
                'url' => 'http://127.0.0.1:8000/post/40',
                'session_id' => '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-15 19:24:44',
                'updated_at' => '2019-08-15 19:24:44',
            ),
            2 => 
            array (
                'id' => 21,
                'post_id' => 41,
            'title' => 'Разработка чат-бота (telegram + youtube)',
                'url' => 'http://127.0.0.1:8000/post/41',
                'session_id' => '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-15 19:54:43',
                'updated_at' => '2019-08-15 19:54:43',
            ),
            3 => 
            array (
                'id' => 22,
                'post_id' => 42,
            'title' => 'Разработка чат-бота (telegram + youtube)',
                'url' => 'http://127.0.0.1:8000/post/42',
                'session_id' => '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-15 20:04:03',
                'updated_at' => '2019-08-15 20:04:03',
            ),
            4 => 
            array (
                'id' => 23,
                'post_id' => 43,
                'title' => 'JavaScript promise nədir? Nə işə yarayır.',
                'url' => 'http://127.0.0.1:8000/post/43',
                'session_id' => '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-15 20:10:59',
                'updated_at' => '2019-08-15 20:10:59',
            ),
            5 => 
            array (
                'id' => 24,
                'post_id' => 44,
                'title' => 'SQL index nədir? necə işləyir?',
                'url' => 'http://127.0.0.1:8000/post/44',
                'session_id' => '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-15 20:24:55',
                'updated_at' => '2019-08-15 20:24:55',
            ),
            6 => 
            array (
                'id' => 25,
                'post_id' => 45,
                'title' => 'TEST',
                'url' => 'http://127.0.0.1:8000/post/45',
                'session_id' => 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-16 04:25:26',
                'updated_at' => '2019-08-16 04:25:26',
            ),
            7 => 
            array (
                'id' => 26,
                'post_id' => 46,
                'title' => 'TEST2',
                'url' => 'http://127.0.0.1:8000/post/46',
                'session_id' => 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-16 04:27:03',
                'updated_at' => '2019-08-16 04:27:03',
            ),
            8 => 
            array (
                'id' => 27,
                'post_id' => 47,
                'title' => 'TEST 3',
                'url' => 'http://127.0.0.1:8000/post/47',
                'session_id' => 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-16 04:32:55',
                'updated_at' => '2019-08-16 04:32:55',
            ),
            9 => 
            array (
                'id' => 28,
                'post_id' => 48,
                'title' => 'TEST 4',
                'url' => 'http://127.0.0.1:8000/post/48',
                'session_id' => 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-16 04:34:53',
                'updated_at' => '2019-08-16 04:34:53',
            ),
            10 => 
            array (
                'id' => 29,
                'post_id' => 49,
                'title' => 'TEST 5',
                'url' => 'http://127.0.0.1:8000/post/49',
                'session_id' => 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-16 04:35:19',
                'updated_at' => '2019-08-16 04:35:19',
            ),
            11 => 
            array (
                'id' => 30,
                'post_id' => 50,
                'title' => 'TEST 23',
                'url' => 'http://127.0.0.1:8000/post/50',
                'session_id' => 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-16 04:57:31',
                'updated_at' => '2019-08-16 04:57:31',
            ),
            12 => 
            array (
                'id' => 31,
                'post_id' => 51,
                'title' => 'haha',
                'url' => 'http://127.0.0.1:8000/post/51',
                'session_id' => 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-16 04:59:28',
                'updated_at' => '2019-08-16 04:59:28',
            ),
            13 => 
            array (
                'id' => 32,
                'post_id' => 52,
                'title' => 'NEW TEST',
                'url' => 'http://127.0.0.1:8000/post/52',
                'session_id' => 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-16 05:15:54',
                'updated_at' => '2019-08-16 05:15:54',
            ),
            14 => 
            array (
                'id' => 33,
                'post_id' => 53,
                'title' => 'TEST',
                'url' => 'http://127.0.0.1:8000/post/53',
                'session_id' => 'kJRcO73ahkl7WmNGfpPmBZt7KlRQgdWs5Ioz11oI',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-19 15:52:53',
                'updated_at' => '2019-08-19 15:52:53',
            ),
            15 => 
            array (
                'id' => 34,
                'post_id' => 54,
                'title' => 'БЛОК',
                'url' => 'http://127.0.0.1:8000/post/54',
                'session_id' => 'rixic4xFCBQPjp1aqttw5XU7kmPlaOJroK8999eu',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-20 16:07:32',
                'updated_at' => '2019-08-20 16:07:32',
            ),
            16 => 
            array (
                'id' => 35,
                'post_id' => 55,
                'title' => 'Markdown Test',
                'url' => 'http://127.0.0.1:8000/post/55',
                'session_id' => 'wQdnAhAplMnQIOwRtfhfz2U4oQoaTfVpQVMu1nza',
                'user_id' => '2',
                'ip' => '127.0.0.1',
            'agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116',
                'created_at' => '2019-08-21 14:10:09',
                'updated_at' => '2019-08-21 14:10:09',
            ),
        ));
        
        
    }
}