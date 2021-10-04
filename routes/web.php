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

Route::view('/password_mail', 'password_mail');

// Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('saveLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('saveRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password (added in v6.2)
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
/* Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify'); // v5.x */
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> 'auth'], function(){
    Route::resource('/courses', CourseController::class);
    Route::post('/courses/add_course', 'CourseController@addCourse')->name('add_course');
    Route::post('/courses/join_course', 'CourseController@joinCourse')->name('join_course');

    Route::resource('/profile', ProfileController::class);
    Route::post('/profile/edit', 'ProfileController@edit')->name('profile.edit');

    Route::resource('/dashboard', DashboardController::class);
    Route::post('/materials/add_materials', 'DashboardController@addMaterials')->name('add_materials');
    Route::post('/materials/view_materials', 'DashboardController@viewMaterials')->name('view_materials');

    Route::resource('/lms', LmsController::class);

    Route::resource('/classroom', ClassroomController::class);
    Route::post('/classroom/set_class', 'ClassroomController@setClass')->name('set_class');
    Route::post('/classroom/enter_class', 'ClassroomController@enterClass')->name('enter_class');

    Route::resource('/student_info', StudentController::class);

    Route::post('/student_detail', 'StudentDetailController@showDetail')->name('student_detail');

    Route::get('/tasks', 'TaskController@index')->name('tasks');

    Route::resource('/posts', PostController::class);

    Route::post('update-likes', 'PostController@updateLikes')->name('updateLikes');
    Route::post('save-comment', 'PostController@saveComment')->name('saveComment');

    Route::resource('/notices', NoticeController::class);

    Route::resource('/materials', MaterialController::class);
    Route::post('/materials/show_materials', 'MaterialController@showMaterials')->name('show_materials');

    Route::resource('/payment', PaymentController::class);

    Route::resource('/examination', ExamController::class);
    Route::post('/add_assignment', 'ExamController@addAssignment')->name('add_assignment');
    Route::post('/give_marks', 'ExamController@giveMarks')->name('give_marks');

    Route::resource('/assignment', AssignmentController::class);
    Route::post('/submit_assignment', 'AssignmentController@submitAssignment')->name('submitAssignment');
    Route::get('/view_assignment', 'AssignmentController@viewAssignment')->name('viewAssignment');
});
