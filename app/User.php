<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Job;
use App\Resume;
use App\Application;
use App\SaveJob;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'industry', 'profession', 'cv_path', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function jobs()
    {
        return $this->hasMany('App\Job', 'id', 'user_id');
    }

    public function applications()
    {
        return $this->hasMany('App\Application', 'id', 'user_id');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\SaveJob', 'id', 'user_id');
    }  

}
