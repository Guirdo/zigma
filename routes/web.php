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
    Route::resource('courses', CourseController::class);
    Route::resource('groups', GroupController::class);

    //Payments
    Route::group(['prefix'=>'payments','as'=>'payments.'],function(){
        Route::get('/index',[PaymentController::class,'index'])->name('index');
        Route::get('/{student}/pay',[PaymentController::class,'pay'])->name('pay');
        Route::post('/',[PaymentController::class,'store'])->name('store');
        Route::get('/{folio}',[PaymentController::class,'show'])->name('show');
        Route::post('/printPDF',[PaymentController::class,'printPDF']);
    });

    //Tutors
    Route::post('/tutors/search',[TutorController::class,'search']);

    //Employees
    Route::resource('employees', EmployeeController::class);
    Route::group(['prefix'=>'employees'],function(){
        Route::post('/search',[EmployeeController::class,'search']);
        Route::post('/searchTeacher',[EmployeeController::class,'searchTeacher']);
    });

    //Courses
    Route::post('/courses/search',[CourseController::class,'search']);
});

