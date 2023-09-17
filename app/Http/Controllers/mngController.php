<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mngController extends Controller
{
    public function index(){
        return view('mng');
    }
    public function manager_emp_check(){
        return view('mng_employee_check');
    }
    public function manager_emp_emp(){
        return view('mng_employee_emp');
    }
    public function manage_emp(){
        return view('manage_emp');
    }
    public function mng_employee(){
        return view('mng_employee');
    }
}
