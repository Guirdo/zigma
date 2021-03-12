<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PaymentController;

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
    return view('welcome');
});

Auth::routes(['register' => false,'reset' => false]);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Resources
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('tutors', TutorController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('groups', GroupController::class);

    //Payments
    Route::get('/payments/index',[PaymentController::class,'index'])->name('payments.index');
    Route::get('/payments/{student}/pay',[PaymentController::class,'pay'])->name('payments.pay');
    Route::post('/payments',[PaymentController::class,'store'])->name('payments.store');
    Route::get('/payments/{payment}',[PaymentController::class,'show'])->name('payments.show');
    Route::post('/payments/printPDF',[PaymentController::class,'printPDF']);

    //Tutors
    Route::post('/tutors/search',[TutorController::class,'search']);

    //Employees
    Route::post('/employees/search',[EmployeeController::class,'search']);
    Route::post('/employees/searchTeacher',[EmployeeController::class,'searchTeacher']);

    //Courses
    Route::post('/courses/search',[CourseController::class,'search']);
});

