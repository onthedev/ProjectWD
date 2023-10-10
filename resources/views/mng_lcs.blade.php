<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>พนักงาน | การยื่นลา</title>
    <style>
        @import url( {{asset('css/mng_lcs.css')}});
    </style>
</head>
<body>
    <x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <nav>
                    <ul>
                        <li><a href="{{ route('manager_emp_check') }}">ตรวจสอบการมาทำงานของพนักงาน</a></li>
                        <li><a href="{{ route('manager_emp_emp') }}">รายชื่อพนักงาน</a></li>
                        <li><a href="{{ route('checklcs') }}">การยื่นลา</a></li>
                    </ul>
                </nav>
                <h1 id="topic">การยื่นลา</h1>
                <div class="container pb-3">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">ลำดับ</th>
                                <th class="text-center" scope="col">รหัสพนักงาน</th>
                                <th class="text-center" scope="col">วันที่เริ่ม</th>
                                <th class="text-center" scope="col">วันสุดท้าย</th>

                                <th class="text-center" scope="col">หมายเหตุ</th>
                            </tr>
                        </thead>
                    @foreach ($leave as $lcs)
                    <tbody>
                        <tr>
                            <td>{{ $lcs->id }}</td>
                            <td>{{ $lcs->emp }}</td>
                            <td> {{ $lcs->time_start }} {{ $lcs->start_date }}</td>
                            <td>{{ $lcs->time_end }} {{ $lcs->end_date }} </td>
                            <td>{{ $lcs->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
