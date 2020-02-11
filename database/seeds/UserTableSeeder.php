<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'username' => 'admin',
                    'email' => 'admin@admin.com',
                    'password' => Hash::make('admin12345'),
                ),
        ));
    }
}
