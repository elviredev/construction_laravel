<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/* USER */
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');

Route::get('/login', [FrontController::class, 'login'])->name('login');
Route::post('/login',[FrontController::class,'login_submit'])->name('login_submit');

Route::get('/register', [FrontController::class, 'register'])->name('register');
Route::post('/register_submit',[FrontController::class,'register_submit'])->name('register_submit');
Route::get('/register_verify/{token}/{email}',[FrontController::class,'register_verify'])->name('register_verify');

Route::get('/forget-password',[FrontController::class,'forget_password'])->name('forget_password');
Route::post('/forget-password',[FrontController::class,'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}',[FrontController::class,'reset_password'])->name('reset_password');
Route::post('/reset-password/{token}/{email}',[FrontController::class,'reset_password_submit'])->name('reset_password_submit');


Route::middleware('auth')->group(function () {
  Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
  Route::get('/profile',[UserController::class,'profile'])->name('profile');
  Route::post('/profile',[UserController::class,'profile_update'])->name('profile_update');
  Route::post('/logout',[UserController::class,'logout'])->name('logout');
});

/* ADMIN */
Route::prefix('admin')->group(function () {
  Route::get('/', function () {return redirect('/admin/login');});
  Route::get('/login',[AdminController::class,'login'])->name('admin_login');
  Route::post('/login',[AdminController::class,'login_submit'])->name('admin_login_submit');
  Route::post('/logout',[AdminController::class,'logout'])->name('admin_logout');
  Route::get('/forget-password',[AdminController::class,'forget_password'])->name('admin_forget_password');
  Route::post('/forget_password_submit',[AdminController::class,'forget_password_submit'])->name('admin_forget_password_submit');
  Route::get('/reset-password/{token}/{email}',[AdminController::class,'reset_password'])->name('admin_reset_password');
  Route::post('/reset-password/{token}/{email}',[AdminController::class,'reset_password_submit'])->name('admin_reset_password_submit');

});

Route::middleware('admin')->prefix('admin')->group(function () {
  Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin_dashboard');
  Route::get('/profile',[AdminController::class,'profile'])->name('admin_profile');
  Route::post('/profile',[AdminController::class,'profile_update'])->name('admin_profile_update');

  Route::get('/slider/index', [AdminSliderController::class, 'index'])->name('admin_slider_index');
  Route::post('/slider/store', [AdminSliderController::class, 'store'])->name('admin_slider_store');
  Route::put('/slider/update/{id}', [AdminSliderController::class, 'update'])->name('admin_slider_update');
  Route::delete('/slider/delete/{id}', [AdminSliderController::class, 'destroy'])->name('admin_slider_delete');

  Route::get('/testimonial/index', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_index');
  Route::post('/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
  Route::put('/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
  Route::delete('/testimonial/delete/{id}', [AdminTestimonialController::class, 'destroy'])->name('admin_testimonial_delete');
});












