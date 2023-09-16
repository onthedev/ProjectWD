<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mngEmpController extends Controller
{
    public function index(){
        return view('mng_employee');
    }
}
