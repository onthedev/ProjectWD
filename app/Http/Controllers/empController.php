<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Addr;
use App\Models\time_attendance;
use App\Models\order_detail;
use App\Models\Ingredient_name;
use App\Models\checkstock;
class empController extends Controller
{
    public function index(){
        $Ingredient_name = Ingredient_name::all();
        $checkstock = checkstock::all();
        $checkstock = checkstock::orderBy('name_id', )->get();
        return view('emp', ['checkstock' => $checkstock, 'Ingredient_name' => $Ingredient_name] );
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
        $employeeId = $request->input('employee_id');
        $employee = Personnel::where('emp_id', $employeeId)->first();

        if ($employee) {
            $currentTime = date("H:i:s");
            $currentDate = now()->toDateString();

            // ตรวจสอบเวลาเข้างาน (time_type = 1)
            if ($request->input('time_type') === '1') {
                $existingCheck = time_attendance::where('emp_id', $employeeId)
                    ->where('date', $currentDate)
                    ->where('time_type', '1')
                    ->first();

            if (!$existingCheck) {
            // ยังไม่มีการเช็คเวลาเข้างานในวันนี้ จึงทำการบันทึกข้อมูล
                $check_attendance = new time_attendance;
                $check_attendance->emp_id = $employeeId;
                $check_attendance->time_type = '1';
                $check_attendance->date = $currentDate;
                $check_attendance->check_in_time = $currentTime;
                $check_attendance->work_status = $request->input('work_status');
                $check_attendance->note = $request->input('note');
                $check_attendance->save();

                $message = 'บันทึกข้อมูลสำเร็จ';
                echo "<script>alert('$message');</script>";
                echo "<script>
                setTimeout(function() {
                    window.location.href = '/employee/checkattendance'   ;
                }, 0);
            </script>";

        } else {
            // พนักงานเช็คเวลาเข้างานไปแล้วในวันนี้
            $message = 'คุณเช็คเวลาเข้างานไปแล้ววันนี้';
            echo "<script>alert('$message');</script>";
            echo "<script>
            setTimeout(function() {
                window.location.href = '/employee/checkattendance'   ;
            }, 0);
        </script>";                }
    }
    // ตรวจสอบเวลาเลิกงาน (time_type = 2)
    elseif ($request->input('time_type') === '2') {
        $existingCheck = time_attendance::where('emp_id', $employeeId)
            ->where('date', $currentDate)
            ->where('time_type', '2')
            ->first();

        if (!$existingCheck) {
            // ยังไม่มีการเช็คเวลาเลิกงานในวันนี้ จึงทำการบันทึกข้อมูล
            $check_attendance = new time_attendance;
            $check_attendance->emp_id = $employeeId;
            $check_attendance->time_type = '2';
            $check_attendance->date = $currentDate;
            $check_attendance->check_out_time = $currentTime;
            $check_attendance->work_status = $request->input('work_status');
            $check_attendance->note = $request->input('note');
            $check_attendance->save();

            $message = 'บันทึกข้อมูลสำเร็จ';
            echo "<script>alert('$message');</script>";
            echo "<script>
            setTimeout(function() {
                window.location.href = '/employee/checkattendance'   ;
            }, 0);
        </script>";
        
        } else {
            // พนักงานเช็คเวลาเลิกงานไปแล้วในวันนี้
            $message = 'คุณเช็คเวลาเลิกงานไปแล้ววันนี้';
            echo "<script>alert('$message');</script>";
            echo "<script>
            setTimeout(function() {
                window.location.href = '/employee/checkattendance'   ;
            }, 0);
        </script>";        }
    }
} else {
    $message = 'รหัสพนักงานไม่ถูกต้อง';
    echo "<script>alert('$message');</script>";
    echo "<script>
    setTimeout(function() {
        window.location.href = '/employee/checkattendance'   ;
    }, 0);
</script>";  }

    }
}



