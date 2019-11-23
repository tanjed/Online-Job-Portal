<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('');
});

Route::group(['prefix' => 'company' ,'middleware' => 'company-auth'],function (){

    Route::get('/dashboard','CompanyDashController@showDashboard')->name('company.dashboard.show');
    Route::get('/job/{id}/applicants','CompanyDashController@showApplicants')->name('company.applicants.show');

    Route::post('/post/job','CompanyDashController@postJob')->name('post.job');
    Route::get('/show/resume/{id}','CompanyDashController@showPDF');

    Route::get('/logout','CompanyAuthController@logout');

});
Route::get('/company/login','CompanyAuthController@showLogin')->name('company.login.show');
Route::post('/company/login','CompanyAuthController@processLogin')->name('company.login.process');

Route::get('/company/register','CompanyAuthController@showRegistration')->name('company.register.show');
Route::post('/company/register','CompanyAuthController@processRegistration')->name('company.register.process');





//Applicant Routes
Route::group(['prefix' => 'applicant','middleware' => 'applicant-auth'],function (){

    Route::get('/dashboard','ApplicantDashController@showDashboard')->name('applicant.dashboard.show');
    Route::get('/{id}/edit','ApplicantDashController@edit')->name('applicant.edit');
    Route::post('/{id}/update','ApplicantDashController@update')->name('applicant.update');

    Route::get('/job/{job}/description','ApplicantDashController@showJobDescription')->name('job.description');
    Route::get('/job/{id}/apply','ApplicantDashController@applyJob')->name('job.apply');

    Route::post('/add/skill','ApplicantDashController@addSkill')->name('skill.add');

    Route::get('/logout','ApplicantAuthController@logout');

});
Route::get('applicant/login','ApplicantAuthController@showLogin')->name('applicant.login.show');
Route::post('applicant/login','ApplicantAuthController@processLogin')->name('applicant.login.process');

Route::get('applicant/register','ApplicantAuthController@showRegistration')->name('applicant.register.show');
Route::post('applicant/register','ApplicantAuthController@processRegistration')->name('applicant.register.process');


