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

        // if ($employee) {
            $currentTime = now();
            $valueFromSelect = $request->input('time_type');

            if ($valueFromSelect === '1') {
                $check_attendance->check_in_time = $currentTime;
            } else {
                $check_attendance->check_out_time = $currentTime;
            }

            $check_attendance->date = $currentDate = now()->toDateString(); // กำหนดค่าวันที่และเวลาเป็นปัจจุบัน

            $check_attendance->latitude = $request->input('latitude_input');
            $check_attendance->longitude = $request->input('longitude_input'); // แก้ชื่อ 'longtitude' เป็น 'longitude'

            $check_attendance->save();

            return view('emp_checkattendance')->with('success', 'บันทึกข้อมูลสำเร็จ');
        // } else {
            $employeeId = $employeeId ?? 'ว่างจ้า มาก ๆ';
            return $employeeId;
        }
    }



