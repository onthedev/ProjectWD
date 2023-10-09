<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Addr;
use App\Models\time_attendance;

class empController extends Controller
{
    public function index(){
            return view('emp');
        }
    public function tocheckattendance(){
        return view('emp_checkattendance');
    }
    public function checkEmployee(Request $request)
    {
        $employeeId = $request->input('employee_id');

        $employee = Personnel::where('emp_id', $employeeId)->first();
        if ($employee) {
            return response()->json(['massages' => $employee->fname]);
        } else {
            return response()->json(['massages' => 'กรุณากรอกรหัสใหม่']);
        }
    }
    public function checkattendance(Request $request)
    {
        $check_attendance = new time_attendance;
        $employeeId = $request->input('employee_id');
        $employee = Personnel::where('emp_id', $employeeId)->first();

        if ($employee) {
            $currentTime = date("H:i:s");
            $time_type = $request->input('time_type');
            $check_attendance->emp_id = $request->input('employee_id');
            if ($time_type === '1') {
                $check_attendance->time_type = $request->input('time_type');
                $check_attendance->check_in_time = $currentTime;
            } else {
                $check_attendance->time_type = $request->input('time_type');
                $check_attendance->check_out_time = $currentTime;
            }

            $check_attendance->date = $currentDate = now()->toDateString();

            $check_attendance->work_status= $request->input('work_status');
            $check_attendance->note= $request->input('note');

            $check_attendance->save();

            return view('emp_checkattendance')->with('true', 'บันทึกข้อมูลสำเร็จ');
        } else {
            return view('id_notfound',['employeeId'=>$employeeId]);
        }
    }
}



