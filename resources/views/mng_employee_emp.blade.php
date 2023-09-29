<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Manager | Employee list</title>
    <style>
        @import url( {{asset('css/style.css')}});
    </style>
</head>
<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <nav>
                        <ul>
                            <li><a href="{{ route('manager_emp_check') }}">check employee attendance</a></li>
                            <li><a href="{{ route('manager_emp_emp') }}">employee</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="container">
                    
                <a class="manage_emp" href="{{ route('manage_emp') }}">เพิ่มนักงาน</a>
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="text-center" scope="col">รหัสพนักงาน</th>
                        <th class="text-center" scope="col">ชื่อ</th>
                        <th class="text-center" scope="col">นามสกุล</th>
                        <th class="text-center" scope="col">เบอร์โทรศัพท์</th>
                      </tr>
                    </thead>
                    @foreach ($emp as $emp)
                    <tr>
                        <td class="text-center">{{ $emp->emp_id }}</td>
                        <td class="text-center">{{ $emp->fname }}</td>
                        <td class="text-center">{{ $emp->lname }}</td>
                        <td class="text-center">{{ $emp->telno }}</td>
                        <td class="text-center">
                        <a href="{{ route('toDetail', ['emp_id'=>$emp->emp_id]) }}" class="detail_emp">เพิ่มเติม</a></td>
                    </tr>
                    @endforeach
            </div>
        </div>
        </div>
    </x-app-layout>

</body>
</html>

