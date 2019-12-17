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
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
//        $this->call(HubsTableSeeder::class);
//        $this->call(AuthorTableSeeder::class);
//        $this->call(CommentsTableSeeder::class);
//        $this->call(FollowersTableSeeder::class);
//        $this->call(HubFollowersTableSeeder::class);
//        $this->call(MediaTableSeeder::class);
//        $this->call(MigrationsTableSeeder::class);
//        $this->call(NotificationStatusTableSeeder::class);
//        $this->call(NotificationsTableSeeder::class);
//        $this->call(PasswordResetsTableSeeder::class);
//        $this->call(PostFavoritesTableSeeder::class);
//        $this->call(PostHubsTableSeeder::class);
//        $this->call(PostVotesTableSeeder::class);
//        $this->call(PostsTableSeeder::class);
    }
}
