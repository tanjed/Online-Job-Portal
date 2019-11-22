<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;

class ApplicantAuthController extends Controller
{
    public function showLogin(){
        return view('applicant.login');
    }

    public function showRegistration(){
        return view('applicant.registration');
    }
    public function processRegistration(Request $request){
        $request = $this->validate($request,[
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        try{
            $applicant = Applicant::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
            auth('applicant')->login($applicant);
            return redirect()->to(route('applicant.dashboard.show'));
        }
        catch (Exception $e){
            return back()->withErrors(['msg' => 'Something went Wrong!']);
        }
    }
    public function processLogin(Request $request){
        $validation = $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        if (auth('applicant')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->to(route('applicant.dashboard.show'));
        }
        return back()->withErrors(["msg" => "Invalid Email or Password"])->withInput($request->only('email'));
    }
}
