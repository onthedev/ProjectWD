<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ผู้จัดการ | การมาทำงานของพนักงาน</title>
    <style>
        @import url( {{asset('css/show_attendance.css')}});
    </style>
</head>
<body>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <nav>
                    <ul>
                        <li><a href="{{ route('manager_emp_check') }}">ตรวจสอบการมาทำงานของพนักงาน</a></li>
                        <li><a href="{{ route('manager_emp_emp') }}">รายชื่อพนักงาน</a></li>
                        <li><a href="{{ route('checklcs') }}">การยื่นลา</a></li>
                    </ul>
                </nav>
                <h1 id="topic">การมาทำงานของพนักงาน</h1>
                <label>
                    <input class=" indented-input" type="radio" name="show_type" value="bydate">
                    เลือกดูจากวันทำงาน
                </label>
                <label>
                    <input class=" indented-input" type="radio" name="show_type" value="byemp_id">
                    เลือกดูจากรหัสพนักงาน
                </label>

                {{-- //ส่วนแสดงผลของการค้นหาด้วยการ search emp_id --}}
                <div  class="containersearch_id"  id="showfindID">

                </div>

            {{-- //ส่วนแสดงผลของการค้นหาด้วยdateradio --}}
                <div class="container" id="showByDate" style="display: block;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">วันที่</th>
                            <th class="text-center" scope="col">รหัสพนักงาน</th>
                            <th class="text-center" scope="col">เวลาเข้างาน</th>
                            <th class="text-center" scope="col">เวลาออกงาน</th>
                            <th class="text-center" scope="col">สถานะการมาทำงาน</th>
                            <th class="text-center" scope="col">หมายเหตุ</th>
                        </tr>
                    </thead>
                    @foreach ($time_attendance->groupBy('date') as $date => $attendances)
                        <tr>
                            <td class="text-center" rowspan="{{ count($attendances) }}">{{ $date }}</td>
                            @foreach ($attendances as $key => $attendance)
                                @if ($key > 0)
                                    <tr>
                                @endif
                                <td class="text-center">{{ $attendance->emp_id }}</td>
                                <td class="text-center">{{ $attendance->check_in_time }}</td>
                                <td class="text-center">{{ $attendance->check_out_time }}</td>
                                @if($attendance->work_status==1)
                                    <td class="text-center"> มาทำงานปกติ</td>
                                @else
                                    <td class="text-center"> ขาด/สาย</td>
                                @endif
                                <td class="text-center">{{ $attendance->note }}</td>
                                @if ($key > 0)
                                    </tr>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>

            {{-- // ส่วนแสดงผลของการค้นหาด้วยemp_idradio --}}
            <div  class="container"  id="showByID" style="display: none;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">รหัสพนักงาน</th>
                            <th class="text-center" scope="col">วันที่</th>
                            <th class="text-center" scope="col">เวลาเข้างาน</th>
                            <th class="text-center" scope="col">เวลาออกงาน</th>
                            <th class="text-center" scope="col">สถานะการมาทำงาน</th>
                            <th class="text-center" scope="col">หมายเหตุ</th>
                        </tr>
                    </thead>
                    @foreach ($time_attendance->groupBy('emp_id') as $emp_id => $attendances)
                        <tr>
                            <td class="text-center" rowspan="{{ count($attendances) }}">{{ $emp_id }}</td>
                            @foreach ($attendances as $key => $attendance)
                                @if ($key > 0)
                                    <tr>
                                @endif
                                <td class="text-center">{{ $attendance->date }}</td>
                                <td class="text-center">{{ $attendance->check_in_time }}</td>
                                <td class="text-center">{{ $attendance->check_out_time }}</td>
                                @if($attendance->work_status==1)
                                <td class="text-center"> มาทำงานปกติ</td>
                                @else
                                <td class="text-center"> ขาด/สาย</td>
                                @endif
                                <td class="text-center">{{ $attendance->note }}</td>
                                @if ($key > 0)
                                    </tr>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
            </table>

            <script>
                // เรียกฟังก์ชันเมื่อเริ่มโหลดหน้าเว็บ
                document.addEventListener('DOMContentLoaded', function() {
                    const radioButtons = document.querySelectorAll('input[name="show_type"]');
                    const showByDate = document.getElementById('showByDate');
                    const showByID = document.getElementById('showByID');

                    radioButtons.forEach(function(radio) {
                        radio.addEventListener('change', function() {
                            if (radio.value === 'bydate') {
                                showByDate.style.display = 'block';
                                showByID.style.display = 'none';
                            }else if((radio.value === 'byemp_id') ){
                                showByID.style.display = 'block';
                                showByDate.style.display = 'none';
                            }
                        });
                    });
                });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>


