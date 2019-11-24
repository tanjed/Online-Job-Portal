<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Applicant extends Authenticatable
{
    protected $guarded = ['id'];
    protected $guard = 'applicant';

    public function scopeApplied($query,$id){
        return $query->where('job_id',$id);
    }
    public function jobs(){
        return $this->belongsToMany(Job::class,'applicant_jobs');
    }
    public function skills(){
        return $this->hasMany(Skill::class);
    }
    public function getUser(){
        return auth('applicant')->user();
    }
}
