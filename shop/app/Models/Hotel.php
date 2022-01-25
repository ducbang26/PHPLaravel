<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'hotel_name',
        'image',
        'location',
        'kinhDo',
        'viDo',
    ];

    public function places()
    {
        return $this->beLongsTo(Place::class);
    }
}
