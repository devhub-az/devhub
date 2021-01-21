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
            User::create(
                [
                    'id'           => 'd80644a7-929e-46fa-8a07-6067e3610afa',
                    'name'         => 'Admin',
                    'username'     => config('devhub.admin_name'),
                    'email'        => config('devhub.admin_email'),
                    'password'     => Hash::make(config('devhub.admin_password')),
                    'status'       => true,
                    'is_admin'     => true,
                    'confirm_code' => Str::random(64),
                    'created_at'   => Carbon::now(),
                    'updated_at'   => Carbon::now(),
                ]
            );
            User::factory()
                ->count(30)
                ->create();
        }
    }
}
