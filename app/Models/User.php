<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = [
        'username',
        'email',
        'phone',
        'role_id',
        'password',
    ];

    public function roles()
    {
        $this->belongsTo(Role::class);
    }

    public function posts()
    {
        $this->hasMany(Post::class);
    }

    public function followers()
    {
        $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function following()
    {
        $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function postFavorites()
    {
        $this->belongsToMany(Post::class, 'post_favorites');
    }

    public function votes()
    {
        $this->hasMany(Vote::class);
    }

    public function comments()
    {
        $this->hasMany(Comments::class);
    }
}
