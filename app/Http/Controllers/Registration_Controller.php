<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration_Model;
class Registration_Controller extends Controller
{
   public function index()
{
    $registrations = Registration_Model::with('course')->latest()->get();
    return view('Admin/Registration', compact('registrations'));
}
}
