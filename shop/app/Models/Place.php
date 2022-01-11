<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlaceImages;
use App\Models\User;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_name',
        'star',
        'description',
        'location',
        'temperature',
        'kinhDo',
        'viDo',
        'popular',
        'region',
    ];

    public function placeImage()
    {
        return $this->hasMany(PlaceImages::class, 'place_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'bookmarks');
    }
}
