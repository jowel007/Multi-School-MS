<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SchoolController;
use App\Http\Controllers\Backend\AdminController;
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

Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'SMSlogin']);
Route::get('forgot', [AuthController::class, 'forgot']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'common'], function () {
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

    // all school route
    Route::get('panel/school', [SchoolController::class, 'schoolList']);
    Route::get('panel/school/create', [SchoolController::class, 'CreateSchool']);
    Route::post('panel/school/add', [SchoolController::class, 'AddSchool']);
    Route::get('panel/school/edit/{id}', [SchoolController::class, 'EditSchool']);
    Route::post('panel/school/edit/{id}', [SchoolController::class, 'UpdateSchool']);
    Route::get('panel/school/delete/{id}', [SchoolController::class, 'DeleteSchool']);

    // all admin route
    Route::get('panel/admin', [AdminController::class, 'AdminList']);
    Route::get('panel/admin/create', [AdminController::class, 'CreateAdmin']);
    Route::post('panel/admin/add', [AdminController::class, 'AddAdmin']);
    Route::get('panel/admin/edit/{id}', [AdminController::class, 'EditAdmin']);
    Route::post('panel/admin/edit/{id}', [AdminController::class, 'UpdateAdmin']);
    Route::get('panel/admin/delete/{id}', [AdminController::class, 'DeleteAdmin']);
});


Route::group(['middleware' => 'admin'], function () {
    // all school route
    Route::get('panel/school', [SchoolController::class, 'schoolList']);
    Route::get('panel/school/create', [SchoolController::class, 'CreateSchool']);
    Route::post('panel/school/add', [SchoolController::class, 'AddSchool']);
    Route::get('panel/school/edit/{id}', [SchoolController::class, 'EditSchool']);
    Route::post('panel/school/edit/{id}', [SchoolController::class, 'UpdateSchool']);
    Route::get('panel/school/delete/{id}', [SchoolController::class, 'DeleteSchool']);

    // all admin route
    Route::get('panel/admin', [AdminController::class, 'AdminList']);
    Route::get('panel/admin/create', [AdminController::class, 'CreateAdmin']);
    Route::post('panel/admin/add', [AdminController::class, 'AddAdmin']);
    Route::get('panel/admin/edit/{id}', [AdminController::class, 'EditAdmin']);
    Route::post('panel/admin/edit/{id}', [AdminController::class, 'UpdateAdmin']);
    Route::get('panel/admin/delete/{id}', [AdminController::class, 'DeleteAdmin']);
});



Route::group(['middleware' => 'school'], function () {});
