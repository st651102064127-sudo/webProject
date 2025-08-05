<?php

use Illuminate\Session\Store;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Courses_Controller;
use App\Http\Controllers\Employee_Controller;
Route::get('/courses', [Courses_Controller::class, 'index'])->name('Courses.Index');
Route::post('/courses/Store',[Courses_Controller::class , 'Store'])->name('Course.Store');
Route::put('/courses/update/{id}', [Courses_Controller::class, 'update'])->name('Course.Update');
Route::delete('/courses/{id}', [Courses_Controller::class, 'destroy'])->name('Course.Destroy');



Route::get('/Employee', [Employee_Controller::class, 'index'])->name('Employee.Index');
Route::post('/Employee/store', [Employee_Controller::class, 'store'])->name('Employee.Store');
Route::put('/Employee/update/{id}', [Employee_Controller::class, 'update'])->name('Employee.Update');

