<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('media')->delete();

        \DB::table('media')->insert(array (
            0 =>
            array (
                'id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1,
                'collection_name' => 'avatars',
                'name' => 'logo1',
                'file_name' => 'logo1.png',
                'mime_type' => 'image/png',
                'size' => 6727,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"small":true,"big":true,"very-big":true}}',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2019-07-22 13:36:12',
                'updated_at' => '2019-07-22 13:36:13',
            ),
            1 =>
            array (
                'id' => 4,
                'model_type' => 'App\\Models\\User',
                'model_id' => 3,
                'collection_name' => 'avatars',
                'name' => 'logo1',
                'file_name' => 'logo1.png',
                'mime_type' => 'image/png',
                'size' => 6727,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"small":true,"big":true,"very-big":true}}',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2019-07-22 13:36:12',
                'updated_at' => '2019-07-22 13:36:13',
            ),
            2 =>
            array (
                'id' => 5,
                'model_type' => 'App\\Models\\User',
                'model_id' => 4,
                'collection_name' => 'avatars',
                'name' => 'sabina',
                'file_name' => 'sabina.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 39956,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"small":true,"big":true,"very-big":true}}',
                'responsive_images' => '[]',
                'order_column' => 2,
                'created_at' => '2019-08-08 02:15:21',
                'updated_at' => '2019-08-08 02:15:23',
            ),
        ));


    }
}
