<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $username = $this->faker->unique()->userName;

        return [
            'id'                => $this->faker->uuid,
            'name'              => $this->faker->name,
            'username'          => $username,
            'avatar'            => $this->addMedia('https://avatar.tobi.sh/'.$username.'.svg?text='.$username[0])->toMediaCollection('avatars'),
            'description'       => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'rating'            => $this->faker->numberBetween(0, 100),
            'karma'             => $this->faker->numberBetween(0, 100),
            'email'             => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ];
    }
}
