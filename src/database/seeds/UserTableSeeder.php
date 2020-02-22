<?php

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * ArticlesSeeder constructor.
     */
    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');
    }

    public function run()
    {
        User::truncate();

        User::create([
            'username' => 'admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('admin12345'),
        ]);

//        User::create([
//            'name'         => 'Serafim',
//            'email'        => 'nesk@xakep.ru',
//            'password'     => 'password',
//            'is_confirmed' => true,
//        ]);

        foreach (range(0, 50) as $i) {
            $user = User::create([
                'username' => $this->faker->userName,
                'email'    => $this->faker->email,
                'password' => Hash::make((string)random_int(0, PHP_INT_MAX)),
            ]);
            echo ' - ' . $i . ': ' . $user->username . "\n";
        }
    }
}
