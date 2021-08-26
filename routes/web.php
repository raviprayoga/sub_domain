<?php

use Illuminate\Support\Facades\Route;
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


Route::get('locale/{locale}', function ($locale){
    \Session::put('locale',$locale);
    return redirect()->back();
});

//dashboard
Route::get('/dashboard', 'UserController@dash')->name('dashboard');

// login
Route::get('/login','SubDomain_AuthController@login')->name('login');
Route::post('/loginpost','SubDomain_AuthController@loginpost');

// logout
Route::get('/','SubDomain_AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth:employe']], function () {

        Route::get('/home', 'UserController@getHome')->name('home');
});

// Route::domain('{website}.localhost::8000')->group(function(){
//     Route::get('/home', 'UserController@subdomain')->name('subdomain');
// });


