<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UserTableSeeder::class);
        $this->call(HubsTableSeeder::class);
        $this->call(LocalizationTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(NotificationStatusTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PostsViewsTableSeeder::class);
        $this->call(PostHubsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
