<?php

namespace Modules\Countries\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Countries\Database\factories\AddressFactory::new();
    }
    /**
     * Get the parent addressable model
     */
    public function addressable()
    {
        return $this->morphTo();
    }
}
