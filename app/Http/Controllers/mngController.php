<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Addr;
use App\Models\time_attendance;

use Illuminate\Support\Facades\DB;

class mngController extends Controller
{
    public function index(){
        $time_attendance = time_attendance::all();
        return view('mng', compact('time_attendance'));
    }

    public function manager_emp_check(){
        $time_attendance = time_attendance::all();
        return view('mng_employee_check', compact('time_attendance'));
    }

    public function manager_emp_emp(){
        $emp = Personnel::all();
        $numOfEmp = Personnel::count();
        return view('mng_employee_emp', compact('emp','numOfEmp'));
    }

    public function manage_emp(){
        $newEmpNumber = Personnel::count() + 1;
        $newEmployeeCode = 'EMP' . str_pad($newEmpNumber, 4, '0', STR_PAD_LEFT);
        return view("manage_emp",['newEmployeeCode'=>$newEmployeeCode]);
    }

    public function toDetail($emp_id){
        $selectemp = Personnel::where('emp_id', $emp_id)->get();
        $addr = addr::where('emp_id', $emp_id)->get();
        return view('emp_detail',['selectemp'=>$selectemp, 'addr'=>$addr]);
    }

    public function toEdit($emp_id){
        $selectemp = Personnel::where('emp_id', $emp_id)->get();
        $addr = addr::where('emp_id', $emp_id)->get();
        return view('edit_emp_detail',['selectemp'=>$selectemp, 'addr'=>$addr]);
    }

    public function addByFile(){
        return view('addbyfile');
    }

    public function addTeam(Request $request){
        $personel = new personnel;
        $personel->fname = $request->input('fname');
        $personel->lname = $request->input('lname');
        $personel->gender = $request->input('gender');
        $personel->emp_id = $request->input('emp_id');
        $personel->salary = $request->input('salary');
        $personel->telno = $request->input('tel');
        $personel->save();

        $addr = new addr;
        $addr->addr=$request->input('addr');
        $addr->emp_id = $request->input('emp_id');
        $addr->Tambon=$request->input('Tambon');
        $addr->Amphoe=$request->input('amphoe');
        $addr->ChangWat=$request->input('changwat');
        $addr->ZipCode=$request->input('zipcode');
        $addr->save();

        return redirect()->route('manager_emp_emp');
    }
    public function edit(Request $request, $emp_id){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $gender = $request->input('gender');
        $emp_id = $request->input('emp_id');
        $salary = $request->input('salary');
        $telno = $request->input('tel');
        Personnel::where('emp_id', $emp_id)->update([
            'fname' => $fname,
            'lname' => $lname,
            'gender' => $gender,
            'emp_id' => $emp_id,
            'salary' => $salary,
            'telno' => $telno,]);

        $addr=$request->input('addr');
        $emp_id = $request->input('emp_id');
        $Tambon=$request->input('Tambon');
        $Amphoe=$request->input('amphoe');
        $ChangWat=$request->input('changwat');
        $ZipCode=$request->input('zipcode');
        Addr::where('emp_id', $emp_id)->update([
            'addr' => $addr,
            'emp_id' => $emp_id,
            'Tambon' => $Tambon,
            'Amphoe' => $Amphoe,
            'ChangWat' => $ChangWat,
            'ZipCode' => $ZipCode,]);

        return redirect()->route('manager_emp_emp');
        }
        public function importCsv(Request $request)
        {
            // ตรวจสอบว่ามีไฟล์ CSV ถูกอัปโหลด
            $validator = Validator::make($request->all(), [
                'csv_file' => 'required|file|mimes:csv,txt',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            // อ่านไฟล์ CSV
            $csv = Reader::createFromPath($request->file('csv_file')->getPathname(), 'r');
            $csv->setHeaderOffset(0);

            // วนลูปผ่านแถวของไฟล์ CSV และเพิ่มข้อมูลในฐานข้อมูล
            foreach ($csv->getRecords() as $record) {
                Employee::create([
                    'name' => $record['name'],
                    'email' => $record['email'],
                    // เพิ่มคอลัมน์อื่นๆ ที่คุณต้องการ
                ]);
            }

            return redirect()->back()->with('success', 'อัปโหลดไฟล์ CSV เรียบร้อยแล้ว');
        }
}
