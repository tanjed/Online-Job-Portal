<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ApplicantJob;
use App\Job;
use App\Skill;
use Illuminate\Http\Request;

class ApplicantDashController extends Controller
{
    public function showDashboard(){
        $jobs = Job::orderBy('date','DESC')->paginate(10);
        return view('applicant.dashboard',compact('jobs'));
    }
    public function showJobDescription(Job $job){
        $is_applied = false;
       foreach ($job->applicants as $applicant){
           if ($applicant->id == auth('applicant')->user()->id){
               $is_applied = true;
               break;
           }
       }

        return view('applicant.job_description',compact('job','is_applied'));
    }
    public function applyJob($job_id){
        $applicant_id = auth('applicant')->user()->id;
        $applicant = Applicant::find($applicant_id);
        if(!empty($applicant->cv_path)){
            ApplicantJob::create([
                'applicant_id' => $applicant_id,
                'job_id'       => $job_id,
            ]);
            return redirect(route('applicant.dashboard.show'));
        }else{
            return redirect(route('applicant.dashboard.show'));
        }
    }
    public function edit($id){
        $applicant = Applicant::findOrFail($id);
        return view('applicant.edit',compact('applicant'));
    }
    public function update($id, Request $request){

       $this->validate($request,[
           'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'profile_pic' => 'image|mimes:jpeg,png,jpg',
        ]);

       try{
           $applicant = Applicant::find($id);

           $applicant->first_name = $request->first_name;
           $applicant->last_name = $request->last_name;
           $applicant->email = $request->email;


           if ($request->has('profile_pic')){
               $imageName = time().'.'.request()->profile_pic->getClientOriginalExtension();
               $path = public_path('\storage\profile_picture');
               $applicant->img_path = "\public\storage\profile_picture\\".$imageName;
               $request->profile_pic->move($path, $imageName);
           }


           if ($request->has('resume')){
               $resumeName = time().'.'.request()->resume->getClientOriginalExtension();
               $path = public_path('\storage\resume');
               $applicant->cv_path = "\public\storage\\resume\\".$resumeName;
               $request->resume->move($path, $resumeName);
           }
           $applicant->save();


       }catch (\Exception $exception){

       }
        return back()->with('success','You have successfully upload image.');

    }
    public function addSkill(Request $request){
        $id = auth('applicant')->user()->id;
        try{
            Skill::create([
                'applicant_id' =>$id,
                'skill_title' => $request->skill,
            ]);
            return redirect(route('applicant.edit',$id));
        }catch (\Exception $exception){
            return redirect(route('applicant.edit',$id));
        }
    }

}
