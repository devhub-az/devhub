<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Hub;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Throwable;

class PostHubsTableSeeder extends Seeder
{
    private $faker;

    /**
     * ArticlesSeeder constructor.
     */
    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');
    }

    public function run()
    {
        $postIds = Article::select('id')->pluck('id')->toArray();
        $hubsIds = Hub::select('id')->pluck('id')->toArray();

        foreach (range(0, 5) as $i) {
            try {
                foreach (range(0, random_int(1, 50)) as $j) {
                    $postId = $this->faker->randomElement($postIds);
                    $hubId = $this->faker->randomElement($hubsIds);

                    \DB::table('post_hubs')->insert([
                        'posts_id' => $postId,
                        'hub_id'   => $hubId,
                    ]);
                }
            } catch (Throwable $e) {
                echo 'ERROR: '.$e->getMessage()."\n";
            }
        }
    }

//    /**
//     * @var Factory
//     */
//    private $faker;
//
//    /**
//     * ArticlesSeeder constructor.
//     */
//    public function __construct()
//    {
//        $this->faker = Factory::create('ru_RU');
//    }
//
//    /**
//     * Auto generated seed file
//     *
//     * @return void
//     */
//    public function run()
//    {
//        $postIds = Article::all()->pluck('id')->toArray();
//        $hubsIds = Hub::all()->pluck('id')->toArray();
//
//        foreach (range(0, 5) as $i) {
//            try {
//                foreach (range(0, random_int(1, 50)) as $j) {
//                    $postId = $this->faker->randomElement($postIds);
//                    $hubId = $this->faker->randomElement($hubsIds);
//
//                    \DB::table('post_hubs')->insert([
//                        'posts_id' => $postId,
//                        'hub_id'   => $hubId,
//                    ]);
//                    echo '   - ' . $j . ': ' . $hubId . ' <-> ' . $postId . "\n";
//                }
//            } catch (Throwable $e) {
//                echo 'ERROR: ' . $e->getMessage() . "\n";
//            }
//        }
//    }
}
