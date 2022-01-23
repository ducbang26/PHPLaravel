<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostImages;
use App\Models\Place;

class Post extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'place_id',
        'user_id',
        'star',
        'content',
        'popular'
    ];

    public function postImage()
    {
        return $this->hasMany(PostImages::class, 'post_id', 'id');
    }

    public function places()
    {
        return $this->beLongsTo(Place::class, 'place_id', 'id');
    }
}
