<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Place;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profileImg',
        'isAdmin'
    ];
    public $appends = [
        'profile_image_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getProfileImageUrlAttribute(){
        if ($this->profileImg) {
            return asset('/uploads/profile_images'.$this->profileImg);
        }else{
            return 'https://ui-avatars.com/api/?background=random&name='.urlencode($this->name);
        }
    }

    public function sendPasswordResetNotification($token)
    {

        $url = 'https://dulichvgo.herokuapp.com/api/reset-password?token=' . $token;

        $this->notify(new ResetPasswordNotification($url));
    }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'bookmarks');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function post_likes()
    {
        return $this->belongsToMany(Post::class, 'likes');
    }
}
