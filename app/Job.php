<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Application;
use App\SaveJob;
use Auth;

class Job extends Model
{

    protected $fillable = [
        'user_id', 'company_name', 'title', 'description', 'email', 'apply_link', 'expires',
    ];


    public function jobCreator()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    

    public function applications()
    {
        return $this->hasMany('App\Application', 'job_id', 'id');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\SaveJob', 'job_id', 'id');
    }    


    
}
