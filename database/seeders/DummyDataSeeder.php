<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accounts\Database\Seeders\UsersTableSeeder;
use Modules\Categories\Database\Seeders\CategoriesDatabaseSeeder;
use Modules\Countries\Database\Seeders\CountriesTableSeeder;
use Modules\Settings\Database\Seeders\SettingsDatabaseSeeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsDatabaseSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CategoriesDatabaseSeeder::class);
    }
}
