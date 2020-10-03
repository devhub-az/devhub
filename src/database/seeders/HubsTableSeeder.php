<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HubsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('hubs')->delete();

        \DB::table('hubs')->insert(array (
            0 =>
            array (
                'id' => 1,
                'logo' => 'images/hubs/3d-printers.png',
                'name' => '3D',
                'rating' => 1,
                'created_at' => '2019-08-10 15:09:44',
                'updated_at' => '2019-08-13 21:25:45',
            ),
            1 =>
            array (
                'id' => 2,
                'logo' => 'images/hubs/ajax.png',
                'name' => 'Ajax',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:44',
                'updated_at' => '2019-08-10 15:57:02',
            ),
            2 =>
            array (
                'id' => 3,
                'logo' => 'images/hubs/algoritm.png',
                'name' => 'Algorithm',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:44',
                'updated_at' => '2019-08-10 15:57:34',
            ),
            3 =>
            array (
                'id' => 4,
                'logo' => 'images/hubs/amphp.png',
                'name' => 'Amp',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:44',
                'updated_at' => '2019-08-10 15:52:02',
            ),
            4 =>
            array (
                'id' => 5,
                'logo' => 'images/hubs/Android.png',
                'name' => 'Android',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:44',
                'updated_at' => '2019-08-10 15:49:46',
            ),
            5 =>
            array (
                'id' => 6,
                'logo' => 'images/hubs/Angular.png',
                'name' => 'Angular',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:44',
                'updated_at' => '2019-08-10 15:49:46',
            ),
            6 =>
            array (
                'id' => 7,
                'logo' => 'images/hubs/Ansible.png',
                'name' => 'Ansible',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:44',
                'updated_at' => '2019-08-10 15:49:46',
            ),
            7 =>
            array (
                'id' => 8,
                'logo' => 'images/hubs/API.png',
                'name' => 'API',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:44',
                'updated_at' => '2019-08-10 15:49:46',
            ),
            8 =>
            array (
                'id' => 9,
                'logo' => 'images/hubs/Arduino.png',
                'name' => 'Arduino',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:49:46',
            ),
            9 =>
            array (
                'id' => 10,
                'logo' => 'images/hubs/ASPNET.png',
                'name' => 'ASP.NET',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:53:23',
            ),
            10 =>
            array (
                'id' => 11,
                'logo' => 'images/hubs/Atom.png',
                'name' => 'Atom',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:49:46',
            ),
            11 =>
            array (
                'id' => 12,
                'logo' => 'images/hubs/Awesome.png',
                'name' => 'Awesome Lists',
                'rating' => 2,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-21 19:18:08',
            ),
            12 =>
            array (
                'id' => 13,
                'logo' => 'images/hubs/aws.png',
                'name' => 'Amazon Web Services',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:54:01',
            ),
            13 =>
            array (
                'id' => 14,
                'logo' => 'images/hubs/Azure.png',
                'name' => 'Azure',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:49:46',
            ),
            14 =>
            array (
                'id' => 15,
                'logo' => 'images/hubs/Babel.png',
                'name' => 'Babel',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:49:46',
            ),
            15 =>
            array (
                'id' => 16,
                'logo' => 'images/hubs/Bash.png',
                'name' => 'Bash',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:49:47',
            ),
            16 =>
            array (
                'id' => 17,
                'logo' => 'images/hubs/Bitcoin.png',
                'name' => 'Bitcoin',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:49:47',
            ),
            17 =>
            array (
                'id' => 18,
                'logo' => 'images/hubs/Blockchain.png',
                'name' => 'Blockchain',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-12-14 19:54:20',
            ),
            18 =>
            array (
                'id' => 19,
                'logo' => 'images/hubs/Bootstrap.png',
                'name' => 'Bootstrap',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:49:47',
            ),
            19 =>
            array (
                'id' => 20,
                'logo' => 'images/hubs/Bot.png',
                'name' => 'Bot',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:45',
                'updated_at' => '2019-08-10 15:59:09',
            ),
            20 =>
            array (
                'id' => 21,
                'logo' => 'images/hubs/C.png',
                'name' => 'C',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-08-10 15:49:47',
            ),
            21 =>
            array (
                'id' => 22,
                'logo' => 'images/hubs/Chrome.png',
                'name' => 'Chrome',
                'rating' => 1,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-08-13 21:25:45',
            ),
            22 =>
            array (
                'id' => 23,
                'logo' => 'images/hubs/Chrome.png',
                'name' => 'Chrome extension',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-08-10 15:55:02',
            ),
            23 =>
            array (
                'id' => 25,
                'logo' => 'images/hubs/Clojure.png',
                'name' => 'Clojure',
                'rating' => 1,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-08-13 21:25:45',
            ),
            24 =>
            array (
                'id' => 26,
                'logo' => 'images/hubs/Code quality.png',
                'name' => 'Code quality',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-12-14 19:46:59',
            ),
            25 =>
            array (
                'id' => 27,
                'logo' => 'images/hubs/Code review.png',
                'name' => 'Code review',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-12-14 19:47:06',
            ),
            26 =>
            array (
                'id' => 28,
                'logo' => 'images/hubs/Compiler.png',
                'name' => 'Compiler',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-12-14 19:47:11',
            ),
            27 =>
            array (
                'id' => 30,
                'logo' => 'images/hubs/Cpp.png',
                'name' => 'C++',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-08-10 15:55:44',
            ),
            28 =>
            array (
                'id' => 31,
                'logo' => 'images/hubs/cryptocurrency.png',
                'name' => 'Cryptocurrency',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-12-14 19:10:53',
            ),
            29 =>
            array (
                'id' => 32,
                'logo' => 'images/hubs/Crystal.png',
                'name' => 'Crystal',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-08-10 15:49:47',
            ),
            30 =>
            array (
                'id' => 33,
                'logo' => 'images/hubs/csharp.png',
                'name' => 'C#',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-08-10 15:56:16',
            ),
            31 =>
            array (
                'id' => 34,
                'logo' => 'images/hubs/CSS.png',
                'name' => 'CSS',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-08-10 15:49:48',
            ),
            32 =>
            array (
                'id' => 35,
                'logo' => 'images/hubs/data_structure.png',
                'name' => 'Data structures',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:46',
                'updated_at' => '2019-12-14 19:05:33',
            ),
            33 =>
            array (
                'id' => 36,
                'logo' => 'images/hubs/data_visualization.png',
                'name' => 'Data visualization',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-12-14 19:10:11',
            ),
            34 =>
            array (
                'id' => 37,
                'logo' => 'images/hubs/database.png',
                'name' => 'Database',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-12-14 19:03:54',
            ),
            35 =>
            array (
                'id' => 38,
                'logo' => 'images/hubs/deep_learning.png',
                'name' => 'Deep learning',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-12-14 19:03:51',
            ),
            36 =>
            array (
                'id' => 41,
                'logo' => 'images/hubs/Django.png',
                'name' => 'Django',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:48',
            ),
            37 =>
            array (
                'id' => 42,
                'logo' => 'images/hubs/Docker.png',
                'name' => 'Docker',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:48',
            ),
            38 =>
            array (
                'id' => 43,
                'logo' => 'images/hubs/Documentation.png',
                'name' => 'Documentation',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            39 =>
            array (
                'id' => 44,
                'logo' => 'images/hubs/.NET.png',
                'name' => '.NET',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            40 =>
            array (
                'id' => 45,
                'logo' => 'images/hubs/Electron.png',
                'name' => 'Electron',
                'rating' => 1,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-13 21:25:45',
            ),
            41 =>
            array (
                'id' => 46,
                'logo' => 'images/hubs/Elixir.png',
                'name' => 'Elixir',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            42 =>
            array (
                'id' => 47,
                'logo' => 'images/hubs/Emacs.png',
                'name' => 'Emacs',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            43 =>
            array (
                'id' => 48,
                'logo' => 'images/hubs/Ember.png',
                'name' => 'Ember',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            44 =>
            array (
                'id' => 49,
                'logo' => 'images/hubs/Emoji.png',
                'name' => 'Emoji',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            45 =>
            array (
                'id' => 50,
                'logo' => 'images/hubs/Emulator.png',
                'name' => 'Emulator',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:47',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            46 =>
            array (
                'id' => 51,
                'logo' => 'images/hubs/ES6.png',
                'name' => 'ES6',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            47 =>
            array (
                'id' => 52,
                'logo' => 'images/hubs/ESLint.png',
                'name' => 'ESLint',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            48 =>
            array (
                'id' => 53,
                'logo' => 'images/hubs/Ethereum.png',
                'name' => 'Ethereum',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            49 =>
            array (
                'id' => 54,
                'logo' => 'images/hubs/Express.png',
                'name' => 'Express',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            50 =>
            array (
                'id' => 55,
                'logo' => 'images/hubs/Firebase.png',
                'name' => 'Firebase',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            51 =>
            array (
                'id' => 56,
                'logo' => 'images/hubs/Firefox.png',
                'name' => 'Firefox',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            52 =>
            array (
                'id' => 57,
                'logo' => 'images/hubs/Flask.png',
                'name' => 'Flask',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            53 =>
            array (
                'id' => 58,
                'logo' => 'images/hubs/Font.png',
                'name' => 'Font',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            54 =>
            array (
                'id' => 59,
                'logo' => 'images/hubs/Framework.png',
                'name' => 'Framework',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            55 =>
            array (
                'id' => 60,
                'logo' => 'images/hubs/Front end.png',
                'name' => 'Front end',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            56 =>
            array (
                'id' => 61,
                'logo' => 'images/hubs/Game engine.png',
                'name' => 'Game engine',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:49',
            ),
            57 =>
            array (
                'id' => 62,
                'logo' => 'images/hubs/Git.png',
                'name' => 'Git',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            58 =>
            array (
                'id' => 63,
                'logo' => 'images/hubs/GitHub API.png',
                'name' => 'GitHub API',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:48',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            59 =>
            array (
                'id' => 64,
                'logo' => 'images/hubs/Go.png',
                'name' => 'Go',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            60 =>
            array (
                'id' => 65,
                'logo' => 'images/hubs/Google.png',
                'name' => 'Google',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            61 =>
            array (
                'id' => 66,
                'logo' => 'images/hubs/Gradle.png',
                'name' => 'Gradle',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            62 =>
            array (
                'id' => 67,
                'logo' => 'images/hubs/GraphQL.png',
                'name' => 'GraphQL',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            63 =>
            array (
                'id' => 68,
                'logo' => 'images/hubs/Gulp.png',
                'name' => 'Gulp',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            64 =>
            array (
                'id' => 69,
                'logo' => 'images/hubs/Haskell.png',
                'name' => 'Haskell',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            65 =>
            array (
                'id' => 70,
                'logo' => 'images/hubs/Homebrew.png',
                'name' => 'Homebrew',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            66 =>
            array (
                'id' => 71,
                'logo' => 'images/hubs/Homebridge.png',
                'name' => 'Homebridge',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            67 =>
            array (
                'id' => 72,
                'logo' => 'images/hubs/HTML.png',
                'name' => 'HTML',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            68 =>
            array (
                'id' => 73,
                'logo' => 'images/hubs/HTTP.png',
                'name' => 'HTTP',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            69 =>
            array (
                'id' => 74,
                'logo' => 'images/hubs/Icon font.png',
                'name' => 'Icon font',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            70 =>
            array (
                'id' => 75,
                'logo' => 'images/hubs/iOS.png',
                'name' => 'iOS',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            71 =>
            array (
                'id' => 76,
                'logo' => 'images/hubs/IPFS.png',
                'name' => 'IPFS',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            72 =>
            array (
                'id' => 77,
                'logo' => 'images/hubs/Java.png',
                'name' => 'Java',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:50',
            ),
            73 =>
            array (
                'id' => 78,
                'logo' => 'images/hubs/JavaScript.png',
                'name' => 'JavaScript',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:49',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            74 =>
            array (
                'id' => 79,
                'logo' => 'images/hubs/Jekyll.png',
                'name' => 'Jekyll',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:50',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            75 =>
            array (
                'id' => 80,
                'logo' => 'images/hubs/jQuery.png',
                'name' => 'jQuery',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:50',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            76 =>
            array (
                'id' => 81,
                'logo' => 'images/hubs/JSON.png',
                'name' => 'JSON',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:50',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            77 =>
            array (
                'id' => 84,
                'logo' => 'images/hubs/Koa.png',
                'name' => 'Koa',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:50',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            78 =>
            array (
                'id' => 85,
                'logo' => 'images/hubs/Kotlin.png',
                'name' => 'Kotlin',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:50',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            79 =>
            array (
                'id' => 86,
                'logo' => 'images/hubs/Kubernetes.png',
                'name' => 'Kubernetes',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:50',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            80 =>
            array (
                'id' => 87,
                'logo' => 'images/hubs/Laravel.png',
                'name' => 'Laravel',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:50',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            81 =>
            array (
                'id' => 88,
                'logo' => 'images/hubs/LaTeX.png',
                'name' => 'LaTeX',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:50',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            82 =>
            array (
                'id' => 89,
                'logo' => 'images/hubs/Library.png',
                'name' => 'Library',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            83 =>
            array (
                'id' => 90,
                'logo' => 'images/hubs/Linux.png',
                'name' => 'Linux',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            84 =>
            array (
                'id' => 91,
                'logo' => 'images/hubs/Localization.png',
                'name' => 'Localization',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            85 =>
            array (
                'id' => 92,
                'logo' => 'images/hubs/Lua.png',
                'name' => 'Lua',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            86 =>
            array (
                'id' => 93,
                'logo' => 'images/hubs/Machine learning.png',
                'name' => 'Machine learning',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            87 =>
            array (
                'id' => 94,
                'logo' => 'images/hubs/macOS.png',
                'name' => 'macOS',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:51',
            ),
            88 =>
            array (
                'id' => 95,
                'logo' => 'images/hubs/Markdown.png',
                'name' => 'Markdown',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            89 =>
            array (
                'id' => 96,
                'logo' => 'images/hubs/Mastodon.png',
                'name' => 'Mastodon',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            90 =>
            array (
                'id' => 97,
                'logo' => 'images/hubs/Material design.png',
                'name' => 'Material design',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            91 =>
            array (
                'id' => 98,
                'logo' => 'images/hubs/MATLAB.png',
                'name' => 'MATLAB',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            92 =>
            array (
                'id' => 99,
                'logo' => 'images/hubs/Maven.png',
                'name' => 'Maven',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            93 =>
            array (
                'id' => 100,
                'logo' => 'images/hubs/Minecraft.png',
                'name' => 'Minecraft',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            94 =>
            array (
                'id' => 101,
                'logo' => 'images/hubs/Mobile.png',
                'name' => 'Mobile',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            95 =>
            array (
                'id' => 102,
                'logo' => 'images/hubs/Monero.png',
                'name' => 'Monero',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:51',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            96 =>
            array (
                'id' => 103,
                'logo' => 'images/hubs/MongoDB.png',
                'name' => 'MongoDB',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            97 =>
            array (
                'id' => 104,
                'logo' => 'images/hubs/Mongoose.png',
                'name' => 'Mongoose',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-08-10 15:49:52',
            ),
            98 =>
            array (
                'id' => 105,
                'logo' => 'images/hubs/Monitoring.png',
                'name' => 'Monitoring',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            99 =>
            array (
                'id' => 106,
                'logo' => 'images/hubs/MvvmCross.png',
                'name' => 'MvvmCross',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            100 =>
            array (
                'id' => 107,
                'logo' => 'images/hubs/MySQL.png',
                'name' => 'MySQL',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            101 =>
            array (
                'id' => 108,
                'logo' => 'images/hubs/NativeScript.png',
                'name' => 'NativeScript',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            102 =>
            array (
                'id' => 109,
                'logo' => 'images/hubs/Nim.png',
                'name' => 'Nim',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            103 =>
            array (
                'id' => 111,
                'logo' => 'images/hubs/Nodejs.png',
                'name' => 'Node.js',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-12-14 19:30:47',
            ),
            104 =>
            array (
                'id' => 112,
                'logo' => 'images/hubs/NoSQL.png',
                'name' => 'NoSQL',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:52',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            105 =>
            array (
                'id' => 113,
                'logo' => 'images/hubs/npm.png',
                'name' => 'npm',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            106 =>
            array (
                'id' => 114,
                'logo' => 'images/hubs/Objective-C.png',
                'name' => 'Objective-C',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            107 =>
            array (
                'id' => 115,
                'logo' => 'images/hubs/OpenGL.png',
                'name' => 'OpenGL',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            108 =>
            array (
                'id' => 116,
                'logo' => 'images/hubs/Operating_system.png',
                'name' => 'Operating system',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            109 =>
            array (
                'id' => 118,
                'logo' => 'images/hubs/Package_manager.png',
                'name' => 'Package manager',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            110 =>
            array (
                'id' => 119,
                'logo' => 'images/hubs/Language_parsing.png',
                'name' => 'Language parsing',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            111 =>
            array (
                'id' => 120,
                'logo' => 'images/hubs/Perl.png',
                'name' => 'Perl',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            112 =>
            array (
                'id' => 121,
                'logo' => 'images/hubs/Perl 6.png',
                'name' => 'Perl 6',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            113 =>
            array (
                'id' => 122,
                'logo' => 'images/hubs/Phaser.png',
                'name' => 'Phaser',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:53',
            ),
            114 =>
            array (
                'id' => 123,
                'logo' => 'images/hubs/PHP.png',
                'name' => 'PHP',
                'rating' => 1,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-15 19:01:47',
            ),
            115 =>
            array (
                'id' => 124,
                'logo' => 'images/hubs/PICO-8.png',
                'name' => 'PICO-8',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:53',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            116 =>
            array (
                'id' => 125,
                'logo' => 'images/hubs/Pixel Art.png',
                'name' => 'Pixel Art',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:54',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            117 =>
            array (
                'id' => 126,
                'logo' => 'images/hubs/PostgreSQL.png',
                'name' => 'PostgreSQL',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:54',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            118 =>
            array (
                'id' => 127,
                'logo' => 'images/hubs/Project management.png',
                'name' => 'Project management',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:54',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            119 =>
            array (
                'id' => 129,
                'logo' => 'images/hubs/PWA.png',
                'name' => 'PWA',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:54',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            120 =>
            array (
                'id' => 130,
                'logo' => 'images/hubs/Python.png',
                'name' => 'Python',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:54',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            121 =>
            array (
                'id' => 131,
                'logo' => 'images/hubs/Qt.png',
                'name' => 'Qt',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:54',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            122 =>
            array (
                'id' => 132,
                'logo' => 'images/hubs/R.png',
                'name' => 'R',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:54',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            123 =>
            array (
                'id' => 133,
                'logo' => 'images/hubs/Rails.png',
                'name' => 'Rails',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:54',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            124 =>
            array (
                'id' => 135,
                'logo' => 'images/hubs/Ratchet.png',
                'name' => 'Ratchet',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            125 =>
            array (
                'id' => 136,
                'logo' => 'images/hubs/React.png',
                'name' => 'React',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            126 =>
            array (
                'id' => 137,
                'logo' => 'images/hubs/React-Native.png',
                'name' => 'React Native',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-12-14 19:40:03',
            ),
            127 =>
            array (
                'id' => 138,
                'logo' => 'images/hubs/ReactiveUI.png',
                'name' => 'ReactiveUI',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            128 =>
            array (
                'id' => 139,
                'logo' => 'images/hubs/Redux.png',
                'name' => 'Redux',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            129 =>
            array (
                'id' => 140,
                'logo' => 'images/hubs/REST API.png',
                'name' => 'REST API',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            130 =>
            array (
                'id' => 141,
                'logo' => 'images/hubs/Ruby.png',
                'name' => 'Ruby',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:54',
            ),
            131 =>
            array (
                'id' => 142,
                'logo' => 'images/hubs/Rust.png',
                'name' => 'Rust',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            132 =>
            array (
                'id' => 143,
                'logo' => 'images/hubs/Sass.png',
                'name' => 'Sass',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            133 =>
            array (
                'id' => 144,
                'logo' => 'images/hubs/Scala.png',
                'name' => 'Scala',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            134 =>
            array (
                'id' => 145,
                'logo' => 'images/hubs/scikit-learn.png',
                'name' => 'scikit-learn',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            135 =>
            array (
                'id' => 146,
                'logo' => 'images/hubs/Software-defined networking.png',
                'name' => 'Software-defined networking',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:55',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            136 =>
            array (
                'id' => 147,
                'logo' => 'images/hubs/Security.png',
                'name' => 'Security',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            137 =>
            array (
                'id' => 148,
                'logo' => 'images/hubs/Server.png',
                'name' => 'Server',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            138 =>
            array (
                'id' => 149,
                'logo' => 'images/hubs/Serverless.png',
                'name' => 'Serverless',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            139 =>
            array (
                'id' => 150,
                'logo' => 'images/hubs/Shell.png',
                'name' => 'Shell',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            140 =>
            array (
                'id' => 151,
                'logo' => 'images/hubs/Sketch.png',
                'name' => 'Sketch',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            141 =>
            array (
                'id' => 152,
                'logo' => 'images/hubs/SpaceVim.png',
                'name' => 'SpaceVim',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            142 =>
            array (
                'id' => 153,
                'logo' => 'images/hubs/Spring Boot.png',
                'name' => 'Spring Boot',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            143 =>
            array (
                'id' => 154,
                'logo' => 'images/hubs/SQL.png',
                'name' => 'SQL',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            144 =>
            array (
                'id' => 155,
                'logo' => 'images/hubs/Storybook.png',
                'name' => 'Storybook',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            145 =>
            array (
                'id' => 156,
                'logo' => 'images/hubs/Support.png',
                'name' => 'Support',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            146 =>
            array (
                'id' => 157,
                'logo' => 'images/hubs/Swift.png',
                'name' => 'Swift',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:55',
            ),
            147 =>
            array (
                'id' => 158,
                'logo' => 'images/hubs/Symfony.png',
                'name' => 'Symfony',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:56',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            148 =>
            array (
                'id' => 159,
                'logo' => 'images/hubs/Telegram.png',
                'name' => 'Telegram',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            149 =>
            array (
                'id' => 160,
                'logo' => 'images/hubs/Tensorflow.png',
                'name' => 'Tensorflow',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            150 =>
            array (
                'id' => 161,
                'logo' => 'images/hubs/Terminal.png',
                'name' => 'Terminal',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            151 =>
            array (
                'id' => 162,
                'logo' => 'images/hubs/Terraform.png',
                'name' => 'Terraform',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            152 =>
            array (
                'id' => 163,
                'logo' => 'images/hubs/Testing.png',
                'name' => 'Testing',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            153 =>
            array (
                'id' => 164,
                'logo' => 'images/hubs/Twitter.png',
                'name' => 'Twitter',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            154 =>
            array (
                'id' => 165,
                'logo' => 'images/hubs/TypeScript.png',
                'name' => 'TypeScript',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            155 =>
            array (
                'id' => 166,
                'logo' => 'images/hubs/Ubuntu.png',
                'name' => 'Ubuntu',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            156 =>
            array (
                'id' => 167,
                'logo' => 'images/hubs/Unity.png',
                'name' => 'Unity',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            157 =>
            array (
                'id' => 168,
                'logo' => 'images/hubs/Unreal Engine.png',
                'name' => 'Unreal Engine',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:57',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            158 =>
            array (
                'id' => 169,
                'logo' => 'images/hubs/Vagrant.png',
                'name' => 'Vagrant',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            159 =>
            array (
                'id' => 170,
                'logo' => 'images/hubs/Vim.png',
                'name' => 'Vim',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            160 =>
            array (
                'id' => 171,
                'logo' => 'images/hubs/Virtual reality.png',
                'name' => 'Virtual reality',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            161 =>
            array (
                'id' => 172,
                'logo' => 'images/hubs/Vue.png',
                'name' => 'Vue.js',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-12-14 19:45:01',
            ),
            162 =>
            array (
                'id' => 173,
                'logo' => 'images/hubs/Wagtail.png',
                'name' => 'Wagtail',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            163 =>
            array (
                'id' => 174,
                'logo' => 'images/hubs/Web Components.png',
                'name' => 'Web Components',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            164 =>
            array (
                'id' => 175,
                'logo' => 'images/hubs/Web app.png',
                'name' => 'Web app',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            165 =>
            array (
                'id' => 176,
                'logo' => 'images/hubs/Webpack.png',
                'name' => 'Webpack',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            166 =>
            array (
                'id' => 177,
                'logo' => 'images/hubs/Windows.png',
                'name' => 'Windows',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:58',
                'updated_at' => '2019-08-10 15:49:56',
            ),
            167 =>
            array (
                'id' => 178,
                'logo' => 'images/hubs/WordPlate.png',
                'name' => 'WordPlate',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:59',
                'updated_at' => '2019-08-10 15:49:57',
            ),
            168 =>
            array (
                'id' => 179,
                'logo' => 'images/hubs/WordPress.png',
                'name' => 'WordPress',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:59',
                'updated_at' => '2019-08-10 15:49:57',
            ),
            169 =>
            array (
                'id' => 180,
                'logo' => 'images/hubs/Xamarin.png',
                'name' => 'Xamarin',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:59',
                'updated_at' => '2019-08-10 15:49:57',
            ),
            170 =>
            array (
                'id' => 181,
                'logo' => 'images/hubs/XML.png',
                'name' => 'XML',
                'rating' => 0,
                'created_at' => '2019-08-10 15:09:59',
                'updated_at' => '2019-08-10 15:49:57',
            ),
        ));

    }
}
