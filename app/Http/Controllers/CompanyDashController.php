<?php

namespace App\Http\Controllers;



use App\Applicant;
use App\Job;
use Carbon\Carbon;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class CompanyDashController extends Controller
{

    public function showDashboard(){
        $company_id = auth('company')->user()->id;
        $jobs = Job::with('applicants')->where('company_id',$company_id)->get();
        return view('company.dashboard',compact('jobs'));
    }
    public function showApplicants($id){
        $job = Job::with('applicants')->where('id',$id)->get();
//        foreach ($job as $job_applicant){
//           echo $job_applicant->applicants;
//        }
        return view('company.applicants',compact('job'));
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

   public function showPDF($id){
       $document_name = Applicant::find($id);
         if($document_name){
       $file =  base_path().$document_name->cv_path;

                if (file_exists($file)){

                    $ext =File::extension($file);

                    if($ext=='pdf'){
                        $content_types='application/pdf';
                    }elseif ($ext=='doc') {
                        $content_types='application/msword';
                    }elseif ($ext=='docx') {
                        $content_types='application/vnd.openxmlformats-officedocument.wordprocessingml.document';
                    }elseif ($ext=='xls') {
                        $content_types='application/vnd.ms-excel';
                    }elseif ($ext=='xlsx') {
                        $content_types='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                    }elseif ($ext=='txt') {
                        $content_types='application/octet-stream';
                    }

                    return response(file_get_contents($file),200)
                        ->header('Content-Type',$content_types);

                }else{
                    exit('Requested file does not exist on our server!');
                }

           }else{
           exit('Invalid Request');
       }
   }
}
