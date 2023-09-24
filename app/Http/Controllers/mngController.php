<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Addr;


class mngController extends Controller
{
    public function index(){
        return view('mng');
    }
    public function manager_emp_check(){
        return view('mng_employee_check');
    }
    public function manager_emp_emp(){
        $emp = personnel::all();
        return view('mng_employee_emp', compact('emp'));
    }
    public function manage_emp(){
        return view("manage_emp");
    }
    public function mng_employee(){
        return view('mng_employee');
    }
    public function addByFile(){
        return view('addbyfile');
    }
    public function addTeam(Request $request){
        $personel = new personnel;
        $personel->fname = $request->input('fname');
        $personel->lname = $request->input('lname');
        $personel->emp_id = $request->input('emp_id');
        $personel->salary = $request->input('salary');
        $personel->telno = $request->input('tel');
        $personel->save();

        $addr = new addr;
        $addr->homeID=$request->input('homeID');
        $addr->villagename=$request->input('villagename');
        $addr->Tambon=$request->input('Tambon');
        $addr->Amphoe=$request->input('amphoe');
        $addr->ChangWat=$request->input('changwat');
        $addr->ZipCode=$request->input('zipcode');
        $addr->save();

        return redirect()->route('manage_emp');
    }
}
