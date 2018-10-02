<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Job;

class Application extends Model
{
    // define Application user (application belongs to user)
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    // define Application job (Aplpication belongs to job)
    public function job()
    {
        return $this->belongsTo('App\Job', 'job_id', 'id');
    }


}
