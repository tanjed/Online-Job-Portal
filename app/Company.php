<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    protected $guarded = ['id'];
    protected $hidden = ['password'];

    public function jobs(){
        return $this->hasMany(Job::class);
    }

}
