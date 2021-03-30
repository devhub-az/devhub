<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        if (App::environment() !== 'prod') {
//            User::factory()
//                ->count(30)
//                ->create();
        }
    }
}
