<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Message extends Model implements  HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'conversation_id',
        'read',
        'body',
        'type',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
    protected function getImageAttribute()
    {
        return  $this->getFirstMediaUrl('image');

    }
    public function user()
    {
        return $this->belongsTo(User::class,'sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_id');
    }
}
