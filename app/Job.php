<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = ['id'];

    public function applicants(){
        return $this->belongsToMany(Applicant::class,'applicant_jobs');
    }
}
