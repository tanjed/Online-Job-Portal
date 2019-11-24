<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexUseController extends Controller
{
    public function showIndex(){
        return view('index');
    }
    public function setApplicantPortal(){
        $type = 'applicant';
        return view('applicant.login',compact('type'));
    }
    public function setCompanyPortal(){
        $type = 'company';
        return view('company.login',compact('type'));
    }
}
