<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 22,
                'migration' => '2016_06_01_000001_create_oauth_auth_codes_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 23,
                'migration' => '2016_06_01_000002_create_oauth_access_tokens_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 24,
                'migration' => '2016_06_01_000003_create_oauth_refresh_tokens_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 25,
                'migration' => '2016_06_01_000004_create_oauth_clients_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 26,
                'migration' => '2016_06_01_000005_create_oauth_personal_access_clients_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 27,
                'migration' => '2019_12_12_180700_create_roles_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 28,
                'migration' => '2019_12_12_180752_create_role_user_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 29,
                'migration' => '2019_12_15_005339_add_role_foreign_key_to_users_table',
                'batch' => 2,
            ),
            8 => 
            array (
                'id' => 30,
                'migration' => '2019_12_20_134451_create_author_table',
                'batch' => 0,
            ),
            9 => 
            array (
                'id' => 31,
                'migration' => '2019_12_20_134451_create_comments_table',
                'batch' => 0,
            ),
            10 => 
            array (
                'id' => 32,
                'migration' => '2019_12_20_134451_create_followers_table',
                'batch' => 0,
            ),
            11 => 
            array (
                'id' => 33,
                'migration' => '2019_12_20_134451_create_hub_followers_table',
                'batch' => 0,
            ),
            12 => 
            array (
                'id' => 34,
                'migration' => '2019_12_20_134451_create_hubs_table',
                'batch' => 0,
            ),
            13 => 
            array (
                'id' => 35,
                'migration' => '2019_12_20_134451_create_localization_table',
                'batch' => 0,
            ),
            14 => 
            array (
                'id' => 36,
                'migration' => '2019_12_20_134451_create_media_table',
                'batch' => 0,
            ),
            15 => 
            array (
                'id' => 37,
                'migration' => '2019_12_20_134451_create_notification_status_table',
                'batch' => 0,
            ),
            16 => 
            array (
                'id' => 38,
                'migration' => '2019_12_20_134451_create_notifications_table',
                'batch' => 0,
            ),
            17 => 
            array (
                'id' => 39,
                'migration' => '2019_12_20_134451_create_oauth_access_tokens_table',
                'batch' => 0,
            ),
            18 => 
            array (
                'id' => 40,
                'migration' => '2019_12_20_134451_create_oauth_auth_codes_table',
                'batch' => 0,
            ),
            19 => 
            array (
                'id' => 41,
                'migration' => '2019_12_20_134451_create_oauth_clients_table',
                'batch' => 0,
            ),
            20 => 
            array (
                'id' => 42,
                'migration' => '2019_12_20_134451_create_oauth_personal_access_clients_table',
                'batch' => 0,
            ),
            21 => 
            array (
                'id' => 43,
                'migration' => '2019_12_20_134451_create_oauth_refresh_tokens_table',
                'batch' => 0,
            ),
            22 => 
            array (
                'id' => 44,
                'migration' => '2019_12_20_134451_create_password_resets_table',
                'batch' => 0,
            ),
            23 => 
            array (
                'id' => 45,
                'migration' => '2019_12_20_134451_create_post_favorites_table',
                'batch' => 0,
            ),
            24 => 
            array (
                'id' => 46,
                'migration' => '2019_12_20_134451_create_post_hubs_table',
                'batch' => 0,
            ),
            25 => 
            array (
                'id' => 47,
                'migration' => '2019_12_20_134451_create_post_votes_table',
                'batch' => 0,
            ),
            26 => 
            array (
                'id' => 48,
                'migration' => '2019_12_20_134451_create_posts_table',
                'batch' => 0,
            ),
            27 => 
            array (
                'id' => 49,
                'migration' => '2019_12_20_134451_create_posts_views_table',
                'batch' => 0,
            ),
            28 => 
            array (
                'id' => 50,
                'migration' => '2019_12_20_134451_create_roles_table',
                'batch' => 0,
            ),
            29 => 
            array (
                'id' => 51,
                'migration' => '2019_12_20_134451_create_users_table',
                'batch' => 0,
            ),
            30 => 
            array (
                'id' => 52,
                'migration' => '2019_12_20_134453_add_foreign_keys_to_users_table',
                'batch' => 0,
            ),
        ));
        
        
    }
}