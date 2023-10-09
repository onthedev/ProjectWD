<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->position_id === 1) {
            return redirect()->route('emp');
        }
        if (Auth::user()->position_id === 2) {
            return redirect()->route('mng');
        }
    }
}

