<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager | add emp by file</title>
</head>
<body>
    <x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('manage_emp') }}">
                    <img class="back-icon" width="30" height="30" src="{{ asset('pics/back-icon.svg') }}" alt="Your SVG Image">
                </a>
                <form action="{{ route('import.csv') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>เพิ่มข้อมูลจากไฟล์</h3>
                    <p>เพิ่มไฟล์ .csv</p>
                    <input type="file" name="csv_file" accept=".csv">
                    <button type="submit">อัปโหลดไฟล์ CSV</button>
                </form>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
