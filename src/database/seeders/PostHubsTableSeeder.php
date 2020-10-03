<?php

namespace Database\Seeders;

use App\Models\Hub;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostHubsTableSeeder extends Seeder
{
    /**
     * @var Factory
     */
    private $faker;

    /**
     * ArticlesSeeder constructor.
     */
    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');
    }

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $postIds = Post::all()->pluck('id')->toArray();
        $hubsIds = Hub::all()->pluck('id')->toArray();

        foreach (range(0, 5) as $i) {
            try {
                foreach (range(0, random_int(1, 50)) as $j) {
                    $postId = $this->faker->randomElement($postIds);
                    $hubId = $this->faker->randomElement($hubsIds);

                    \DB::table('post_hubs')->insert([
                        'posts_id' => $postId,
                        'hub_id'   => $hubId,
                    ]);
                    echo '   - ' . $j . ': ' . $hubId . ' <-> ' . $postId . "\n";
                }
            } catch (Throwable $e) {
                echo 'ERROR: ' . $e->getMessage() . "\n";
            }
        }
    }
}
