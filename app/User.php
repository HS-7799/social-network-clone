<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,Requestable,Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','avatar','banner'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::created(function ($user) {

            $user->journal()->create();
        });
    }
    public function setPasswordAttribute($value)
    {

        return $this->attributes['password'] = bcrypt($value);
    }

    public function getRouteKeyName()
    {
        return "username";
    }


    public function getAvatarAttribute($value)
    {
        return $value ? '/storage/'.$value : '/images/avatar.jpeg';
    }
    public function getBannerAttribute($value)
    {
        return $value ? '/storage/'.$value : '/images/banner.jpeg';

    }

    public function path()
    {
        return '/profiles/'.$this->username;
    }
    /**
     * relationships
     */

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function journal()
    {
        return $this->hasOne(Journal::class);

    }





}
