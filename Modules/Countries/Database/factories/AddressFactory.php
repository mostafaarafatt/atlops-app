<?php
namespace Modules\Countries\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Countries\Entities\Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_details'=>$this->faker->address,
            'country_id'=>rand(1,10),
            'city_id'=>rand(1,10),
        ];
    }
}

