<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Models\UserInfos;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\BookingController;
use App\Http\Middleware\AdminLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/change',[HomeController::class,'change']);
Route::prefix("admin")->group(function(){
    Route::get('/home',[HomeController::class,'homepages'])->middleware('adminLogin')->name('admin.display');
    Route::get('/CustomerManagement',[AdminController::class,'index']);
    //Route for search
    Route::get('/searchByNumber',[AdminController::class,'searchByNumber']);
    Route::get('/searchByAcc',[AdminController::class,'searchByAcc']);
    Route::get('/searchById',[AdminController::class,'searchById']);
    Route::get('/searchByEmail',[AdminController::class,'searchByEmail']);
    //Route for change password
    Route::get('/pwdChangeForm/{id}',[AdminController::class,'pwdChangeForm']);
    Route::post('/pwdChangeForm/{id}',[AdminController::class,'changePwd']);
    //Route for change phone number
    Route::get('/changePNForm/{id}',[AdminController::class,'changePNForm']);
    Route::post('/changePNForm/{id}',[AdminController::class,'changePN']);
    //Route for change email
    Route::get('/changeEmailForm/{id}',[AdminController::class,'changeEmailForm']);
    Route::post('/changeEmailForm/{id}',[AdminController::class,'changeEmail']);
 });

   //Route for login 
 Route::prefix("home")->group(function(){
    Route::get('/',[HomeController::class,'home'])->name('login');
    Route::post('/',[HomeController::class,'login']);
    
 });

 Route::prefix("user")->group(function(){
   //Route for user display home page
   Route::get('/home',[UserController::class,'index']);
   //Route for user detail page
   Route::get('/detail',[UserController::class,'detail']);
   //Route for change user password
   Route::get('/pwdChange',[UserController::class,'pwdForm']);
   Route::post('/pwdChange',[UserController::class,'changePwd']);
   //Route for booking order
   Route::get('/booking',[BookingController::class,'booking_form'])->name('user.booking');
   Route::post('/booking',[BookingController::class,'order']);
 });
