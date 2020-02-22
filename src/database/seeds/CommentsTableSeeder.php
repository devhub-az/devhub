<?php

use Faker\Factory;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Symfony\Component\Finder\Finder;

class CommentsTableSeeder extends Seeder
{
    /**
     * @var Factory
     */
    private $faker;

    /**
     * @var \Symfony\Component\Finder\SplFileInfo[]
     */
    private array $files;

    /**
     * ArticlesSeeder constructor.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        $this->files = iterator_to_array(
            (new Finder())
                ->in(base_path())
                ->name('*.php')
                ->files()
        );

        $this->faker = Factory::create('ru_RU');
    }

    /**
     * Auto generated seed file
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        Comment::truncate();

        foreach (range(0, 99) as $i) {
            $article = Comment::create([
                'author_id' => $this->faker->numberBetween(1, 49),
//                'image'          => $this->faker->randomElement([
//                    '1.png',
//                    '2.png',
//                    '3.png',
//                    '4.png',
//                    '5.png',
//                    '6.png',
//                ]),
                'body'      => $this->createContent(),
                'post_id'   => $this->faker->numberBetween(1, 100)
//                'status'         => $this->faker->randomElement(['Draft', 'Review', 'Published']),
//                'published_at'   => Carbon::now()
//                    ->subDays(240)
//                    ->addDays(random_int(0, 300)),
            ]);
        }
    }

    /**
     * @return string
     * @throws Exception
     */
    private function createContent(): string
    {
        $paragraphsCount = random_int(2, 20);

        $result = [];

        for ($j = 0; $j < $paragraphsCount; ++$j) {
            if (random_int(0, 4) > 2) {
                $result[] = $this->createTitle();
            }
        }

        return implode("\n", $result);
    }

    /**
     * @return string
     * @throws Exception
     */
    private function createTitle(): string
    {
        $level = random_int(1, 6);

        return "\n" .
            str_repeat('#', $level) . ' ' .
            $this->sentences(1, true) . "\n";
    }

    /**
     * @param int $count
     * @param bool $asString
     * @return array|string
     */
    private function sentences(int $count = 3, bool $asString = false)
    {
        $sentences = require __DIR__ . '/resources/dictionary.php';

        $random = $this->faker->randomElements($sentences, $count);

        return $asString ? implode(' ', $random) : $random;
    }
}
