<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        @import url( {{asset('css/mng_emp.css')}});
    </style>
</head>
<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <nav>
                        <ul>
                            <li><a href="{{ route('manager_emp_check') }}">check employee attendance</a></li>
                            <li><a href="{{ route('manager_emp_emp') }}">employee</a></li>
                        </ul>
                    </nav>
                    <div class="container">
                        <nav class="navbar navbar-light">
                            <a href="#">
                                <img class="back-icon" width="30" height="30" src="{{ asset('pics/back-icon.svg') }}" alt="Your SVG Image">
                            </a>
                            <a href="{{ route('addByFile') }}" class="btn addfilebtn"><img class="excel-icon" width="30" height="30" src="{{ asset('pics/excel-icon.svg') }}" alt="Your SVG Image">
                                เพิ่มข้อมูลจากไฟล์</a>
                          </nav>
                          <h2 class="text-custom-size">เพิ่มพนักงาน</h2>
                          <form action="{{ route('addTeam') }}" method="post">
                            <div class="container border-b p-6 m-2 mx-auto">
                            <div class="row">
                            <div class="col-6">
                                <h3 class="h3-header">ข้อมูลส่วนตัว</h3>
                                <label for="fname">first name:</label><br>
                                <input  class="indented-input border rounded p-2" type="text" name="fname" id="fname">
                            </div>
                            <div class="col-6">
                                <h3 class="h3-header">&nbsp;</h3>
                                <label for="lname">last name:</label><br>
                                <input  class="indented-input border rounded p-2" type="text" name="lname" id="lname">
                            </div>
                            <div class="col-6">
                                <label for="emp_id">รหัสพนักงาน:</label><br>
                                <input  class="indented-input border rounded p-2" type="text" name="emp_id" id="emp_id">
                            </div>
                            <div class="col-6">
                                <label for="salary">Salary:</label><br>
                                <input class="indented-input border rounded p-2" type="text" name="salary" id="salary">
                            </div>
                            <div class="col-12">
                                <label for="tel">tel no.:</label><br>
                                <input class="indented-input border rounded p-2" type="tel" name="tel" id="tel">
                            </div>
                            </div>
                            </div>
                            <div class="container border-b p-6 m-2 mx-auto">
                                <div class="row">
                            <div class="col-12">
                                <h3 class="h3-header">ที่อยู่</h3>
                                <label for="addr"></label><br>
                                <textarea name="addr" id="addr" class="indented-input border border-gray-300 rounded-lg p-2 w-64 h-32 resize-none focus:ring focus:ring-blue-300 focus:border-blue-500"></textarea>
                            </div>
                            <div class="col-6">
                                <label>จังหวัด:</label><br>
                                <input  class="indented-input border rounded p-2" type="text" name="changwat" id="changwat">
                            </div>
                            <div class="col-6">
                                <label>อำเภอ:</label><br>
                                <input  class="indented-input border rounded p-2" type="text" name="amphoe" id="amphoe">
                            </div>
                            <div class="col-6">
                                <label>ตำบล:</label><br>
                                <input  class="indented-input border rounded p-2" type="text" name="Tambon" id="Tambon">
                            </div>
                            <div class="col-6">
                                <label>เลขไปรษณีย์:</label><br>
                                <input  class="indented-input border rounded p-2" type="text" name="zipcode" id="zipcode">
                            </div>
                        </div>
                            </div>
                        <div class="flex justify-center items-center">
                        <button class="submit subbtn">
                            เพิ่มข้อมูลพนักงาน
                          </button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        </form>
    </x-app-layout>

</body>
</html>
