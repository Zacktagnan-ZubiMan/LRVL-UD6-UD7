<?php

namespace App;

use App\Post;
use App\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'direction', 'phone', 'country', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Un user puede escribir (puede tener) uno o más posts
     *
     * @return void
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * A un user se le pueden asignar (puede pertenecer a) uno o más profiles
     *
     * @return void
     */
    public function profiles() {
        return $this->belongsToMany(Profile::class);
    }
}
