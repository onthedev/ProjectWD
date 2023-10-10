<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>พนักงาน | ระบบลา</title>
    <style>
        @import url( {{asset('css/lcs.css')}});
    </style>
</head>
<body>
    <x-appemp-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 mt-6 rounded shadow-lg">
                <h1 id="topic">ยื่นลา</h1>
                <p id="annotation">*ถ้าต้องการลามากกว่าครึ่งวัน ไม่จำเป็นต้องใส่เวลา</p>
                <div class="container flex justify-center items-center h-screen">
                <form action="{{ route('submitleave') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-6">
                            <label class="block" for="employee_id">รหัสพนักงาน</label>
                            <input type="text"  class="indented-input border rounded p-2 w-100"  name="emp_id" id="employee_id" required>
                        </div>

                        <div class="col-6">
                            <label class="block">วันที่เริ่มลา</label>
                            <input type="time" class="border rounded w-30 py-2 px-3 text-gray-700 mb-2" name="time_start">
                            <input  class="border rounded py-2 px-3 text-gray-700 leading-tight w-50" name="start_date" type="date">
                        </div>
                        <div class="col-6">
                            <label  class="block">วันที่สิ้นสุดการลา</label>
                            <input type="time" class="border rounded w-30 pt-2 py-2 px-3 text-gray-700 mb-2" name="time_end">
                            <input  class="border rounded py-2 px-3 text-gray-700 leading-tight w-50" name="end_date"  type="date">
                        </div>
                        <div class="col-12">
                            <label  class="block">หมายเหตุเพิ่มเติม</label>
                                <input type="text"  class="indented-input border rounded w-100"  name="note" id="note">
                        </div>
                </div>
                          </div>
                    <div class="flex justify-center items-center m-2">
                        <br>
                    <button type="submit" id="subbtn">ยื่น</button>
                    </div>
                </form>
            </div>
        </div>
    </x-appemp-layout>
</body>
</html>
