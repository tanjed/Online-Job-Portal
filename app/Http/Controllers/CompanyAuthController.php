<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyAuthController extends Controller
{
    public function showLogin(){
        return view('company.login');
    }
    public function processLogin(Request $request){
        $validation = $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        if (auth('company')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->to(route('company.dashboard.show'));
        }
        return back()->withErrors(["msg" => "Invalid Email or Password"])->withInput($request->only('email'));
    }
    public function showRegistration(){
        return view('company.registration');
    }
    public function  processRegistration(Request $request){
        $request = $this->validate($request,[
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'business_name' => 'required|min:10',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        try{
            $company = Company::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'business_name' => $request['business_name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
            auth('company')->login($company);
            return redirect()->to(route('company.dashboard.show'));
        }
        catch (Exception $e){
            return back()->withErrors(['msg' => 'Something went Wrong!']);
        }
    }
    public function logout(Request $request){
        auth('company')->logout();
        $request->session()->invalidate();
        return redirect()->intended(route('company.login.show'));
    }
}
