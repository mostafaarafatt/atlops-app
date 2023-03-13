<?php

namespace Modules\Orders\Database\Seeders;

use Arr;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\User;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\Service;
use Modules\Categories\Entities\SubCategory;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Modules\Orders\Entities\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fake = Factory::create();
        $userTypes = ['client', 'provider'];
        $orderTypes = ['company', 'individual'];
        $contactTypes = ['phone', 'chat'];

        $user = User::create([
            'name' => $fake->sentence(1),
            'last_name' => $fake->sentence(1),
            'bio' => $fake->sentence(10),
            'dob' => $fake->date(),
            'kind' => $userTypes[array_rand($userTypes)],
            'email' => $fake->email(),
            'phone' => $fake->phoneNumber(),
            'password' => bcrypt('12345678')
        ]);


        foreach (range(1, 20) as $index) {
            $categoryId = Category::inRandomOrder()->first()->id;
            $countrytId = Country::inRandomOrder()->first()->id;
            Order::create([
                'name' => $fake->sentence(2),
                'description' =>  $fake->text(),
                'expected_start_price' => 10,
                'expected_end_price' => 100,
                'phone' => $fake->phoneNumber(),
                'type' => $orderTypes[array_rand($orderTypes)],
                'contact_type' => $contactTypes[array_rand($contactTypes)],
                'quantity' => rand(10, 99),
                'status' => rand(0, 1),
                'user_id' => $user->id,
                'category_id' => $categoryId,
                'sub_category_id' => SubCategory::where('category_id', $categoryId)->inRandomOrder()->first()->id ?? null,
                'service_id' => Service::where('category_id', $categoryId)->inRandomOrder()->first()->id ?? null,
                'country_id' => $countrytId,
                'city_id' => City::where('country_id', $countrytId)->inRandomOrder()->first()->id,
            ]);
        }
    }
}
