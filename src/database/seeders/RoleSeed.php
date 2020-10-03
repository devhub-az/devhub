<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Bouncer;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->to('users_manage');
    }
}
