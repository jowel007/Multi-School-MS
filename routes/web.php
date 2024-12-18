<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SchoolController;
use Illuminate\Support\Facades\Route;


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

Route::get('/',[AuthController::class,'login']);
Route::post('/',[AuthController::class,'SMSlogin']);
Route::get('forgot',[AuthController::class,'forgot']);
Route::get('logout',[AuthController::class,'logout']);

Route::group(['middleware'=>'common'], function(){
    Route::get('panel/dashboard',[DashboardController::class,'dashboard']);
    Route::get('panel/school',[SchoolController::class,'schoolList']);
    Route::get('panel/school/create',[SchoolController::class,'CreateSchool']);
    Route::post('panel/school/add',[SchoolController::class,'AddSchool']);
    Route::get('panel/school/edit/{id}',[SchoolController::class,'EditSchool']);
    Route::post('panel/school/edit/{id}',[SchoolController::class,'UpdateSchool']);
    Route::get('panel/school/delete/{id}',[SchoolController::class,'DeleteSchool']);
});


