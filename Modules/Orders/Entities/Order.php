<?php

namespace Modules\Orders\Entities;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\Service;
use Modules\Categories\Entities\SubCategory;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model implements HasMedia
{
    use HasFactory, Filterable, HasUploader, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'expected_start_price',
        'expected_end_price',
        'phone',
        'type',
        'contact_type',
        'quantity',
        'status',
        'category_id',
        'sub_category_id',
        'service_id',
        'country_id',
        'city_id',
    ];

    protected $table = 'orders';


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'media',
    ];


    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('orders')
            ->useFallbackUrl('https://www.orderimages.io/' . $this->code . '/shiny/64.png');
    }



    /**
     * The Partner image url.
     *
     * @return bool
     */
    public function getImage()
    {
        return $this->getFirstMediaUrl('orders');
    }


    // Relationships

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
