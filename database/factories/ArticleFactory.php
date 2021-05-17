<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.a.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $title = $this->faker->sentence(random_int(3, 10));

        return [
            'id' => $this->faker->uuid,
            'author_id' => $this->faker->randomElement(User::pluck('id')),
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->realText(random_int(1000, 2000)),
        ];
    }
}
