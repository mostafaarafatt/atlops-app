<?php


namespace Modules\Accounts\Entities\Relations;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


trait UserRelations
{
    // Has Many

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
