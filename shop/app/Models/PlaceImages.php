<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'image',
    ];
    
}
