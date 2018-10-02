<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Job;

class Application extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function job()
    {
        return $this->belongsTo('App\Job', 'job_id', 'id');
    }


}
