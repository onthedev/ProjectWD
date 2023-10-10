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
    <title>ผู้จัดการ | แก้ไขข้อมูลพนักงาน</title>
    <script>
        function tosave() {
            if (window.confirm("คุณต้องการแก้ไขข้อมูลนี้ใช่หรือไม่")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <style>
        @import url({{ asset('css/edit.css') }});
    </style>
</head>

<body>
    <x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white p-8 mt-6 rounded shadow-lg">
                <a href="{{ route('toDetail', ['emp_id' => $selectemp[0]->emp_id]) }}">
                    <img class="back-icon" width="30" height="30" src="{{ asset('pics/back-icon.svg') }}"
                        alt="Your SVG Image">
                </a>
                <h1 id="topic">แก้ไขข้อมูลพนักงาน</h1>
                <form action="{{ route('edit', ['emp_id' => $selectemp[0]->emp_id]) }}" method="post" onsubmit="tosave()">
                    @csrf
                    <div class="container border-b p-6 m-2 mx-auto">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="h3-header">ข้อมูลส่วนตัว</h3>
                                <label for="fname">ชื่อจริง:</label><br>
                                <input value="{{ $selectemp[0]->fname }}" class="indented-input border rounded p-2"
                                    type="text" name="fname" id="fname" required>
                            </div>
                            <div class="col-6">
                                <h3 class="h3-header">&nbsp;</h3>
                                <label for="lname">นามสกุล:</label><br>
                                <input class="indented-input border rounded p-2" type="text" name="lname"
                                    id="lname" value="{{ $selectemp[0]->lname }}" required>
                            </div>
                            <div class="col-6">
                                <label value="{{ $selectemp[0]->gender }}" for="gender"
                                    class="form-label">เพศ:</label>
                                <select name="gender"
                                    class=" indented-input block appearance-none bg-white border border-gray-300 hover:border-gray-400 rounded w-64"
                                    aria-label="Default select example" required>
                                    <option value="หญิง">หญิง</option>
                                    <option value="ชาย">ชาย</option>
                                </select>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                            </div>
                            <div class="col-6">
                                <label for="emp_id">รหัสพนักงาน:</label><br>
                                <input class="indented-input border rounded p-2" type="text" name="emp_id"
                                    id="emp_id" value="{{ $selectemp[0]->emp_id }}" required readonly>
                            </div>
                            <div class="col-6">
                                <label for="salary">เงินเดือน:</label><br>
                                <input class="indented-input border rounded p-2" type="text" name="salary"
                                    id="salary" value="{{ $selectemp[0]->salary }}" pattern="^\d+(\.\d{1,2})?$"
                                    required>
                            </div>
                            <div class="col-6">
                                <label for="tel">เบอร์โทรศัพท์มือถือ:</label><br>
                                <input class="indented-input border rounded p-2" type="tel" name="tel"
                                    id="tel" value="{{ $selectemp[0]->telno }}" pattern="^\d{10}$" required>
                            </div>
                        </div>
                    </div>
                    <div class="container border-b p-6 m-2 mx-auto">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="h3-header">ที่อยู่</h3>
                                <label for="addr"></label><br>
                                <textarea name="addr" id="addr"
                                    class="indented-input border border-gray-300 rounded-lg p-2 w-64 h-32 resize-none focus:ring focus:ring-blue-300 focus:border-blue-500"
                                    required>{{ $addr[0]->addr }}</textarea>
                            </div>
                            <div class="col-6">
                                <label>จังหวัด:</label><br>
                                <input class="indented-input border rounded p-2" type="text" name="changwat"
                                    id="changwat" value="{{ $addr[0]->ChangWat }}" required>
                            </div>
                            <div class="col-6">
                                <label>อำเภอ:</label><br>
                                <input class="indented-input border rounded p-2" type="text" name="amphoe"
                                    id="amphoe" value="{{ $addr[0]->Amphoe }}" required>
                            </div>
                            <div class="col-6">
                                <label>ตำบล:</label><br>
                                <input class="indented-input border rounded p-2" type="text" name="Tambon"
                                    id="Tambon" value="{{ $addr[0]->Tambon }}" required>
                            </div>
                            <div class="col-6">
                                <label>เลขไปรษณีย์:</label><br>
                                <input pattern="[0-9]{5}" class="indented-input border rounded p-2" type="text"
                                    name="zipcode" id="zipcode" value="{{ $addr[0]->ZipCode }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <button type="submit" class="submit subbtn">
                            แก้ไข
                        </button>
                    </div>
            </div>
        </div>
        </form>
        </div>
    </x-app-layout>
</body>

</html>
