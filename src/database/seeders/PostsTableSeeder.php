<?php

declare(strict_types=1);

use Faker\Factory;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Symfony\Component\Finder\Finder;

/**
 * Class ArticlesSeeder.
 */
class PostsTableSeeder extends Seeder
{
    /**
     * @var Factory
     */
    private $faker;

    /**
     * @var \Symfony\Component\Finder\SplFileInfo[]
     */
    private $files;

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
     * Run the database seeds.
     * @throws Exception
     */
    public function run()
    {
        Post::truncate();

        foreach (range(0, 100) as $i) {
            $article = Post::create([
                'author_id' => $this->faker->numberBetween(1, 49),
                'name'      => $this->sentences(1, true),
                'body'      => $this->createContent(),
            ]);

            echo ' - ' . $i . ': ' . $article->title . "\n";
        }
    }

    /**
     * @return string
     * @throws InvalidArgumentException
     * @throws Exception
     */
    private function createContent(): string
    {
        $paragraphsCount = random_int(2, 40);

        $result = [];

        for ($j = 0; $j < $paragraphsCount; ++$j) {
            if (random_int(0, 4) > 2) {
                $result[] = $this->createTitle();
            }

            if (random_int(0, 9) > 8) {
                $result[] = $this->createList();
            }

            if (random_int(0, 4) > 3) {
                $result[] = $this->createQuote();
            }

//            if (random_int(0, 8) > 7) {
//                $result[] = $this->createCode();
//            }

            $result[] = $this->createParagraph();
        }

        return implode("\n", $result);
    }

    /**
     * @return string
     * @throws Exception
     */
    private function createParagraph(): string
    {
        return $this->sentences(random_int(2, 15), true);
    }

    /**
     * @return string
     * @throws Exception
     */
    private function createTitle(): string
    {
        $level = random_int(1, 3);

        return "\n" .
            str_repeat('#', $level) . ' ' .
            $this->sentences(1, true) . "\n";
    }

    /**
     * @return string
     * @throws Exception
     */
    private function createList(): string
    {
        $listSize = random_int(2, 10);

        $result = [];
        for ($i = 0; $i < $listSize; $i++) {
            $result[] = (random_int(0, 5) && $i !== 0 > 4 ? '  ' : '') .
                '- ' . $this->sentences(1, true);
        }

        return implode("\n", $result) . "\n";
    }

    /**
     * @return string
     */
    private function createQuote(): string
    {
        return '> ' . $this->sentences(1, true) . "\n";
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    private function createCode(): string
    {
        $file = $this->faker->randomElement($this->files);
        $sources = $file->getContents();

        return "\n" . '```' . "\n" .
            $sources . "\n" .
            '```';
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
