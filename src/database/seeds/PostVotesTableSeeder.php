<?php

use App\Models\Post;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostVotesTableSeeder extends Seeder
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
        $userIds = User::all()->pluck('id')->toArray();

        foreach (range(0, 5) as $i) {
            try {
                foreach (range(0, random_int(1, count($postIds))) as $j) {
                    $postId = $this->faker->randomElement($postIds);
                    $userId = $this->faker->randomElement($userIds);

                    \DB::table('post_votes')->insert([
                        'user_id' => $userId,
                        'post_id' => $postId,
                        'status'  => random_int(0, 1)
                    ]);
                }
            } catch (Throwable $e) {
                echo 'ERROR: ' . $e->getMessage() . "\n";
            }
        }
    }
}
