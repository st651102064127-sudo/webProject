<?php

use Illuminate\Session\Store;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Courses_Controller;
Route::get('/courses', [Courses_Controller::class, 'index'])->name('Courses.Index');

Route::post('/Course/Store',[Courses_Controller::class , 'Store'])->name('Course.Store');

