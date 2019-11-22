<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class ApplicantDashController extends Controller
{
    public function showDashboard(){
        $jobs = Job::orderBy('date','DESC')->paginate(10);
        return view('applicant.dashboard',compact('jobs'));
    }
    public function showJobDescription($id){
        $job = Job::findOrFail($id);
        dd($job);
    }
}
