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

        if (Auth::user()->position == 'emp') {
            return redirect()->route('emp');
        }
        if (Auth::user()->position == 'mng') {
            return redirect()->route('mng');
        }
    }
}

