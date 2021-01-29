<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Str;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        if (App::environment() !== 'prod') {
            User::factory()
                ->count(30)
                ->create();
        }
    }
}
