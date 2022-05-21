<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\MyBookingsController;
use App\Http\Controllers\Resturant\ResturantHomeContoller;

use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\FooterController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/search_resturant', [HomeController::class,'search_resturant'])->name('search_resturant');

Route::get('/view_resturant/{id}', [HomeController::class,'show'])->name('view_resturant');
Route::post('/create_order', [HomeController::class,'create'])->name('create_order');
Route::get('/my_bookings', [MyBookingsController::class,'index'])->name('my_orders')->middleware('auth');
Route::get('/my_booking/delete/{id}', [MyBookingsController::class,'destroy'])->name('delete_booking')->middleware('auth');
Route::get('/my_booking/edit/{id}', [MyBookingsController::class,'edit'])->name('edit_booking')->middleware('auth');
Route::post('/my_booking/update/{id}', [MyBookingsController::class,'update'])->name('update_booking')->middleware('auth');
 
Route::get('/resturant', [ResturantHomeContoller::class,'index'])->name('resturant_home')->middleware('auth');
Route::get('/search_by_date', [ResturantHomeContoller::class,'search_by_date'])->name('search_by_date')->middleware('auth');
Route::get('/close_resturant', [ResturantHomeContoller::class,'close_resturant'])->name('close_resturant')->middleware('auth');
Route::post('/update_resturant', [ResturantHomeContoller::class,'update_resturant'])->name('update_resturant')->middleware('auth');
Route::get('/order/{id}/delete', [ResturantHomeContoller::class,'destroy'])->name('delete_order')->middleware('auth');
Route::get('/schedule_week', [ResturantHomeContoller::class,'schedule_week'])->name('schedule_week')->middleware('auth');
Route::get('/order/{id}/close', [ResturantHomeContoller::class,'close_booking'])->name('close_booking')->middleware('auth');
Route::get('/get_all_closed_bookings', [ResturantHomeContoller::class,'get_all_closed_bookings'])->name('get_all_closed_bookings')->middleware('auth');



Route::get('/signin',[SignInController::class,'index'])->name('login')->middleware('guest');
Route::post('/signin',[SignInController::class,'signin'])->name('signin')->middleware('guest');

Route::get('/signup',[SignUpController::class,'index'])->name('signup')->middleware('guest');
Route::post('/signup',[SignUpController::class,'store'])->name('signup')->middleware('guest');







Route::prefix('admin')->group(function () {
Route::get('/',[AdminHomeController::class,'index'])->name('admin_home')->middleware('auth');
Route::post('/add_resturant',[AdminHomeController::class,'store'])->name('add_resturant')->middleware('auth');
Route::get('/resturant/{id}/delete',[AdminHomeController::class,'destroy'])->name('delete_resturant')->middleware('auth');
Route::get('/resturant/{id}/edit',[AdminHomeController::class,'edit'])->name('edit_resturant')->middleware('auth');
Route::post('/resturant/{id}/update',[AdminHomeController::class,'update'])->name('admin_update_resturant')->middleware('auth');

Route::get('/users',[AdminUserController::class,'index'])->name('admin_users')->middleware('auth');
Route::post('/add_user',[AdminUserController::class,'store'])->name('add_user')->middleware('auth');
Route::get('/user/{id}/delete',[AdminUserController::class,'destroy'])->name('delete_user')->middleware('auth');
Route::get('/user/{id}/edit',[AdminUserController::class,'edit'])->name('edit_user')->middleware('auth');
Route::post('/user/{id}/update',[AdminUserController::class,'update'])->name('update_user')->middleware('auth');


Route::get('/footer',[FooterController::class,'index'])->name('admin_footer')->middleware('auth');
Route::post('/footer/add',[FooterController::class,'store'])->name('admin_add_footer')->middleware('auth');
Route::get('/footer/delete/{id}',[FooterController::class,'destroy'])->name('admin_delete_footer')->middleware('auth');


});



Route::get('/signout',function(){
    auth()->logout();
    return redirect()->route('signin');
    })->name('signout')->middleware('auth');