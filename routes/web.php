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

Route::view('/', 'welcome');

Route::view('/login', 'login')->name('login');
Route::view('/registration', 'registration');

Route::view('/course1', 'course1');

Route::resource('/courses', \App\Http\Controllers\CourseController::class)->middleware('auth');
Route::resource('/users', \App\Http\Controllers\UserController::class);
