<?php

namespace Modules\Orders\Entities;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use App\Models\Favorites;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accounts\Entities\User;
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
        'user_id',
        'category_id',
        'sub_category_id',
        'service_id',
        'country_id',
        'city_id',
        'loved_order',
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
            ->useFallbackUrl('http://62.171.160.229/web/image?model=res.users&id=87&field=image_64');
    }



    /**
     * The Partner image url.
     *
     * @return bool
     */
    public function getImage()
    {
        // return $this->getFirstMediaUrl('orders');
        return $this->getFirstMediaUrl('orders') ? asset($this->getFirstMediaUrl('orders')) : asset('/images/user.png');
    }

    public function getImagesAttribute()
    {
        return $this->getMediaResource('orders');
    }


    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function favUsers()
    {
        return $this->belongsToMany(Favorites::class, 'favorites');
    }

    public function getfav($user_id, $order_id)
    {
        return Favorites::where(['user_id' => $user_id, 'order_id' => $order_id])->exists();
    }
}
