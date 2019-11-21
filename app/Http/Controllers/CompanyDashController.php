<?php

namespace App\Http\Controllers;

use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyDashController extends Controller
{

    public function showDashboard(){
        $company_id = auth('company')->user()->id;
        $jobs = Job::where('company_id',$company_id)->get();
        return view('company.dashboard',compact('jobs'));
    }
    public function showApplicants($id){
        dd($id);
    }
   public function postJob(Request $request){
       $company_id = auth('company')->user()->id;
        $this->validate($request,[
            'job_title' => 'required|min:5',
            'job_description' =>'required|min:10 ',
            'salary' => 'required',
            'location' => 'required',
            'country' => 'required'
        ]);
        try{
            Job::create([
                'job_title' => $request->job_title,
                'job_description' =>$request->job_description,
                'salary' => $request->salary,
                'location' => $request->location,
                'date' => Carbon::today(),
                'country' => $request->country,
                'company_id' =>  $company_id,

            ]);
            return redirect(route('company.dashboard.show'));

        }catch (\Exception $e){
            dd($e);
            return back()->withErrors(['msg' => 'Job Create Failed']);
        }
   }
}
