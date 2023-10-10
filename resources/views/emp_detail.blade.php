<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>ผู้จัดการ | ข้อมูลพนักงาน</title>
    <style>
        @import url( {{asset('css/emp_detail.css')}});
    </style>
</head>
<body>
    <x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-6 overflow-hidden shadow-xl sm:rounded-lg">
                <div id="back-icon">
                <a href="{{ route('manager_emp_emp') }}" class="link-with-margin-left">
                    <img class="back-icon" width="30" height="30" src="{{ asset('pics/back-icon.svg') }}" alt="Your SVG Image">
                </a>
            </div>
                <h1 id="topichead">ข้อมูลพนักงาน</h1>
                <h2 id="showname">แสดงข้อมูลพนักงาน : {{ $selectemp[0]->fname }} {{ $selectemp[0]->lname  }}</h2>
            <div class="container">
                <h3>ข้อมูลส่วนตัว</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="table-light">รหัสพนักงาน</th>
                            <td>{{ $selectemp[0]->emp_id}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">ชื่อจริง</th>
                            <td>{{ $selectemp[0]->fname}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">นามสกุล</th>
                            <td>{{ $selectemp[0]->lname}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">เพศ</th>
                            <td>{{ $selectemp[0]->gender}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">เงินเดือน</th>
                            <?php
                            $formatsalary = number_format($selectemp[0]->salary , 2, '.', ',');
                            ?>
                            <td>{{$formatsalary}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">เบอร์โทรศัพท์</th>
                            <td>{{ $selectemp[0]->telno}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <div class="container">
                <h3>ที่อยู่</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="table-light">ที่อยู่</th>
                            <td>{{ $addr[0]->addr}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">ตำบล</th>
                            <td>{{ $addr[0]->Tambon}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">อำเภอ</th>
                            <td>{{ $addr[0]->Amphoe}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">จังหวัด</th>
                            <td>{{ $addr[0]->ChangWat}}</td>
                        </tr>     <tr>
                            <th class="table-light">รหัสไปรษณีย์</th>
                            <td>{{ $addr[0]->ZipCode}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center items-center">
                <a href="{{ route('toEdit',['emp_id'=>$selectemp[0]->emp_id])}}" class="btn btn-primary editbtn">แก้ไขข้อมูล</a>
            </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
