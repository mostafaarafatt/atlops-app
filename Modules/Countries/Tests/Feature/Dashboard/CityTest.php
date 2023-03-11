<?php

namespace Modules\Countries\Tests\Feature\Dashboard;

use App\Http\Middleware\VerifyCsrfToken;
use Astrotomic\Translatable\Validation\RuleFactory;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Tests\TestCase;

class CityTest extends TestCase
{


    /** @test */
    public function it_can_create_a_new_city()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class); // remove if test fails
        $this->actingAsAdmin();
        $country = Country::factory()->create();
        $this->assertEquals(0, City::count());
        $response = $this->post(
            route('dashboard.countries.cities.store', $country),
            RuleFactory::make([
                '%name%' => 'Cairo',
            ])
        );
        $response->assertRedirect();
        $this->assertEquals(1, City::count());
    }

    /** @test */
    public function it_can_display_city_edit_form()
    {
        $this->actingAsAdmin();
        $city = City::factory()->create();
        $response = $this->get(route('dashboard.countries.cities.edit', [$city->country, $city]));
        $response->assertSuccessful();
        $response->assertSee(trans('countries::cities.actions.edit'));
    }

    /** @test */
    public function it_can_update_city()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class); // remove if test fails
        $this->actingAsAdmin();

        $this->assertEquals(0, City::count());

        $city = City::factory()->create();

        $response = $this->put(
            route('dashboard.countries.cities.update', [$city->country, $city]),
            RuleFactory::make([
                '%name%' => 'Cairo',
            ])
        );

        $city->refresh();

        $response->assertRedirect();

        $this->assertEquals($city->name, 'Cairo');
    }

    /** @test */
    public function it_can_delete_city()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class); // remove if test fails
        $this->actingAsAdmin();
        $city = City::factory()->create();
        $this->assertEquals(Country::count(), 1);
        $response = $this->delete(route('dashboard.countries.cities.destroy', [$city->country, $city]));
        $response->assertRedirect();
        $this->assertEquals(City::count(), 0);
    }
}
