<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Applicant extends Authenticatable
{
    protected $guarded = ['id'];

    public function jobs(){
        return $this->belongsToMany(Job::class,'applicant_jobs');
    }
}
