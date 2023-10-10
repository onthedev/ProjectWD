<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>ผู้จัดการ | รายชื่อพนักงาน</title>
    <style>
        @import url({{ asset('css/mng_emp_list.css') }});
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
                    <div class="container">
                        <h1 id="topic">รายชื่อพนักงาน</h1>
                        <div class="containerResult align-items-center rounded text-center">
                            @if ($numOfEmp <= 0)
                                <p>ไม่มีพนักงาน</p>
                            @else
                                <p>มีพนักงานจำนวน {{ $numOfEmp }} คน</p>
                            @endif
                            <div>
                                <a class="manage_emp" href="{{ route('manage_emp') }}">เพิ่มนักงาน</a>
                                <a class="manage_emp" id="showAllEmp">แสดงรายชื่อพนักงานทั้งหมด</a>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <label for="ip_empid" class="block">ค้นหาด้วยรหัสพนักงาน</label>
                                    <input type="text" name="ip_empid" id="ip_empid"
                                        class="bg-white border border-gray-300 rounded-full py-1 w-1/4 indented-input"
                                        placeholder="กรอกรหัสพนักงาน">
                                    <a class="search_btn" id="showEmpByidBtn">ค้นหา</a>
                                </div>
                                <div class="col-6">
                                    <label for="ip_empname" class="block">ค้นหาด้วยชื่อพนักงาน</label>
                                    <input type="text" name="ip_empname" id="ip_empname"
                                        class="bg-white border border-gray-300 rounded-full py-1 w-1/4 indented-input"
                                        placeholder="กรอกชื่อพนักงาน">
                                    <a class="search_btn" id="showEmpBynameButton">ค้นหา</a>
                                    </div>
                                </div>
                            </div>
                            <div id="employeeTableContainer">
                            </div>

                            <div id="employeeNameTableContainer">

                            </div>
                        <div>

                        </div>
                        <script>
                        document.getElementById('showEmpByidBtn').addEventListener('click', function() {
                            // ดึงรหัสพนักงานที่ต้องการแสดงข้อมูล
                            var employeeIdToDisplay = document.getElementById('ip_empid').value;
                            const showDefualt = document.getElementById('showDefualt');

                            // ดึงข้อมูลพนักงานจากตัวแปร $emp โดยใช้ JavaScript
                            var employees = {!! json_encode($emp) !!};

                            // ค้นหาพนักงานที่ตรงกับรหัสพนักงานที่ป้อนใน input
                            var selectedEmployee = employees.find(function(employee) {
                                return employee.emp_id === employeeIdToDisplay;
                            });

                            // แสดงข้อมูลพนักงานที่เลือก
                            if (selectedEmployee) {
                                showDefualt.style.display = 'none';
                                document.getElementById('ip_empid').value = '';

                                // สร้างตารางแสดงข้อมูลพนักงาน
                                var tableHTML = '<table class="table table-bordered table-striped">';
                                tableHTML += '<thead>';
                                tableHTML += '<tr>';
                                tableHTML += '<th class="text-center" scope="col">รหัสพนักงาน</th>';
                                tableHTML += '<th class="text-center" scope="col">ชื่อ</th>';
                                tableHTML += '<th class="text-center" scope="col"">นามสกุล</th>';
                                tableHTML += '<th class="text-center" scope="col">เบอร์โทร</th>';
                                tableHTML += '</tr>';
                                tableHTML += '</thead>';
                                tableHTML += '<tbody class="bg-white divide-y divide-gray-200">';

                                // เพิ่มแถวข้อมูลพนักงาน
                                tableHTML += '<tr>';
                                tableHTML += '<td class="text-center">' + selectedEmployee.emp_id + '</td>';
                                tableHTML += '<td class="text-center">' + selectedEmployee.fname + '</td>';
                                tableHTML += '<td class="text-center">' + selectedEmployee.lname + '</td>';
                                tableHTML += '<td class="text-center">' + selectedEmployee.telno + '</td>';
                                tableHTML += '</tr>';

                                tableHTML += '</tbody>';
                                tableHTML += '</table>';

                                // แสดงตารางข้อมูลพนักงานใน #employeeTableContainer
                                document.getElementById('employeeNameTableContainer').innerHTML = tableHTML;

                                // สร้าง URL โดยใส่ค่า emp_id ลงไป
                                var url = '{{ route("toDetail", ["emp_id" => ":emp_id"]) }}';
                                url = url.replace(':emp_id', selectedEmployee.emp_id);

                                // สร้างลิงก์ไปยังหน้ารายละเอียดพนักงาน
                                var link = document.createElement('a');
                                link.href = url;
                                link.className = 'detail_emp';
                                link.textContent = 'เพิ่มเติม';

                                // เพิ่มลิงก์ไปยัง DOM
                                var linkContainer = document.createElement('td');
                                linkContainer.className = 'text-center';
                                linkContainer.appendChild(link);

                                var tableBody = document.querySelector('.bg-white.divide-y.divide-gray-200');
                                var lastRow = tableBody.lastChild;
                                lastRow.appendChild(linkContainer);
                            } else {
                                alert('รหัสพนักงานไม่ถูกต้อง')
                            }
                        });
                    </script>
                        <script>
                  // JavaScript
                  document.getElementById('showEmpBynameButton').addEventListener('click', function() {
    // ดึงรหัสพนักงานที่ต้องการแสดงข้อมูล
    var employeeIdToDisplay = document.getElementById('ip_empname').value;
    const showDefualt = document.getElementById('showDefualt');

    // ดึงข้อมูลพนักงานจากตัวแปร $emp โดยใช้ JavaScript
    var employees = {!! json_encode($emp) !!};

    // ค้นหาพนักงานที่ตรงกับรหัสพนักงานที่ป้อนใน input
    var selectedEmployee = employees.find(function(employee) {
        return employee.fname === employeeIdToDisplay;
    });

    // แสดงข้อมูลพนักงานที่เลือก
    if (selectedEmployee) {
        document.getElementById('ip_empname').value = '';
        showDefualt.style.display = 'none';

        // สร้างตารางแสดงข้อมูลพนักงาน
        var tableHTML = '<table class="table table-bordered table-striped">';
        tableHTML += '<thead>';
        tableHTML += '<tr>';
        tableHTML += '<th class="text-center" scope="col">รหัสพนักงาน</th>';
        tableHTML += '<th class="text-center" scope="col">ชื่อ</th>';
        tableHTML += '<th class="text-center" scope="col"">นามสกุล</th>';
        tableHTML += '<th class="text-center" scope="col">เบอร์โทร</th>';
        tableHTML += '<th class="text-center" scope="col"></th>';
        tableHTML += '</tr>';
        tableHTML += '</thead>';
        tableHTML += '<tbody class="bg-white divide-y divide-gray-200">';

        // เพิ่มแถวข้อมูลพนักงาน
        tableHTML += '<tr>';
        tableHTML += '<td class="text-center">' + selectedEmployee.emp_id + '</td>';
        tableHTML += '<td class="text-center">' + selectedEmployee.fname + '</td>';
        tableHTML += '<td class="text-center">' + selectedEmployee.lname + '</td>';
        tableHTML += '<td class="text-center">' + selectedEmployee.telno + '</td>';

        tableHTML += '</tr>';

        tableHTML += '</tbody>';
        tableHTML += '</table>';

        document.getElementById('employeeNameTableContainer').innerHTML = tableHTML;

     // สร้าง URL โดยใส่ค่า emp_id ลงไป
     var url = '{{ route("toDetail", ["emp_id" => ":emp_id"]) }}';
                                url = url.replace(':emp_id', selectedEmployee.emp_id);

                                // สร้างลิงก์ไปยังหน้ารายละเอียดพนักงาน
                                var link = document.createElement('a');
                                link.href = url;
                                link.className = 'detail_emp';
                                link.textContent = 'เพิ่มเติม';

                                // เพิ่มลิงก์ไปยัง DOM
                                var linkContainer = document.createElement('td');
                                linkContainer.className = 'text-center';
                                linkContainer.appendChild(link);

                                var tableBody = document.querySelector('.bg-white.divide-y.divide-gray-200');
                                var lastRow = tableBody.lastChild;
                                lastRow.appendChild(linkContainer);
    } else {
        alert('ชื่อพนักงานไม่ถูกต้อง')
    }
});

</script>
<script>
    <!-- ข้อมูลพนักงานจะแสดงที่นี่ -->
   document.getElementById('showAllEmp').addEventListener('click', function() {
       // ดึงรหัสพนักงานที่ต้องการแสดงข้อมูล
       const showDefualt = document.getElementById('showDefualt');
           showDefualt.style.display = 'block';
           document.getElementById('employeeNameTableContainer').innerHTML = null;
           document.getElementById('employeeTableContainer').innerHTML = tableHTML;
   });
</script>

                <div  class="container"  id="showDefualt" style="display: block;">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">รหัสพนักงาน</th>
                                    <th class="text-center" scope="col">ชื่อ</th>
                                    <th class="text-center" scope="col">นามสกุล</th>
                                    <th class="text-center" scope="col">เบอร์โทรศัพท์</th>
                                    <th class="text-center" scope="col"></th>
                                </tr>
                            </thead>
                            @foreach ($emp as $emp)
                                <tr>
                                    <td class="text-center">{{ $emp->emp_id }}</td>
                                    <td class="text-center">{{ $emp->fname }}</td>
                                    <td class="text-center">{{ $emp->lname }}</td>
                                    <td class="text-center">{{ $emp->telno }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('toDetail', ['emp_id' => $emp->emp_id]) }}"
                                            class="detail_emp">เพิ่มเติม</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
    </x-app-layout>
    </div>
</body>

</html>
