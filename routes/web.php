<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <<<<< ✅ สำคัญมาก
use App\Http\Controllers\Courses_Controller;
use App\Http\Controllers\Employee_Controller;
use App\Http\Controllers\Registration_Controller;
use App\Http\Controllers\Login_Controller;
use App\Http\Controllers\Register_Controller;
use App\Http\Middleware\AuthSession;

Route::middleware(AuthSession::class)->group(function () {
    Route::get('/courses', [Courses_Controller::class, 'index'])->name('Courses.Index');
    Route::post('/courses/Store', [Courses_Controller::class, 'Store'])->name('Course.Store');
    Route::put('/courses/update/{id}', [Courses_Controller::class, 'update'])->name('Course.Update');
    Route::delete('/courses/{id}', [Courses_Controller::class, 'destroy'])->name('Course.Destroy');

    Route::get('/Employee', [Employee_Controller::class, 'index'])->name('Employee.Index');
    Route::post('/Employee/store', [Employee_Controller::class, 'store'])->name('Employee.Store');
    Route::put('/Employee/update/{id}', [Employee_Controller::class, 'update'])->name('Employee.Update');
    Route::delete('/Employee/{uuid}', [Employee_Controller::class, 'destroy'])->name('Employee.Destroy');

    Route::get('/registrations', [Registration_Controller::class, 'index'])->name('registrations.index');

    Route::get('/Dashboard', function () {
        return view('Admin.Dashboard');
    })->name('Admin.Dashboard')->middleware(AuthSession::class);
});

// User routes
Route::get('/login', function () {
    return view('User.Login');
})->name('User.Login');

Route::get('/register', function () {
    return view('User.form_register');
})->name('User.register');

Route::post('/login/session', [Login_Controller::class, 'login'])->name('User.login.session');

Route::post('/register/submit', [Register_Controller::class, 'register'])->name('register.submit');

// ✅ Logout route
Route::post('/logout', function () {
    Auth::logout();
    session()->flush(); // ล้าง session ด้วย
    return redirect('/login');
})->name('logout');
