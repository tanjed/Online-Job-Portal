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
    return view('company.registration');
});


Route::get('/login','CompanyAuthController@showLogin')->name('company.login.show');
Route::post('/login','CompanyAuthController@processLogin')->name('company.login.process');

Route::get('/register','CompanyAuthController@showRegistration')->name('company.register.show');
Route::post('/register','CompanyAuthController@processRegistration')->name('company.register.process');
