<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\UserType\Entities\UserType;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = \Modules\Accounts\Entities\Admin::firstOrCreate([
            'email' => 'root@demo.com',
        ], \Modules\Accounts\Entities\Admin::factory()->raw([
            'name' => 'Root',
            'email' => 'root@demo.com',
            'phone' => '01156382044',
        ]));

        $root->attachRole('super_admin');

        $admin = \Modules\Accounts\Entities\Admin::firstOrCreate([
            'email' => 'admin@demo.com',
        ], \Modules\Accounts\Entities\Admin::factory()->raw([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'phone' => '987654123',
        ]));

        $admin->attachRole('super_admin');
    }
}
