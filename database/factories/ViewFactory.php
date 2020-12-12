<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\View;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = View::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => $this->faker->randomElement(Article::pluck('id')),
            'ip'         => $this->faker->ipv4,
            'agent'      => $this->faker->userAgent,
            'referer'    => $this->faker->url,
        ];
    }
}
