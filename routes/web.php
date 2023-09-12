<?php

use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\DepartmentController;

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


Route::middleware('auth')->group(function () {

//Admin Dashboard
Route::get('/', [AdminController::class, 'dashboard']);

Route::get('/admin', [AdminController::class, 'dashboard']);

//Admin login
Route::get('admin/adminAuth/login', [AdminController::class, 'login']);
Route::post('admin/adminAuth/login', [AdminController::class, 'check_login']);
Route::get('admin/adminAuth/logout', [AdminController::class, 'logout']);


//Roomtype Route
Route::resource('admin/roomtype', RoomtypeController::class);
Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class, 'destroy']);

//Room
Route::resource('admin/rooms', RoomController::class);
Route::get('admin/rooms/{id}/delete', [RoomController::class, 'destroy']);


//Customer
Route::resource('admin/customer', CustomerController::class);
Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);

//Delete Image
Route::get('admin/roomtypeimage/delete/{id}', [RoomtypeController::class,'destroy_image']);

//Department
Route::resource('/admin/department', DepartmentController::class);
Route::get('admin/department/{id}/delete', [DepartmentController::class, 'destroy']);

//Staff
Route::resource('/admin/staff', StaffController::class);
Route::get('admin/staff/{id}/delete', [StaffController::class, 'destroy']);


//Staff Payment
Route::get('admin/staff/payment/{id}/add', [StaffController::class, 'add_payment']);
Route::post('admin/staff/payment/{id}', [StaffController::class, 'save_payment']);
Route::get('admin/staff/payments/{id}' , [StaffController::class, 'all_payments']);
Route::get('admin/staff/payment/{id}/{staff_id}/delete', [StaffController::class, 'delete_payment']);


//Booking
Route::resource('/admin/booking', BookingController::class);
Route::get('admin/booking/{id}/delete', [BookingController::class, 'destroy']);
Route::get('admin/booking/available-rooms/{checkin_date}', [BookingController::class, 'available_rooms']);

});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
