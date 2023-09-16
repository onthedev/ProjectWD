<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url( {{asset('css/style.css')}});
    </style>
</head>
<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <nav>
                        <ul>
                            <li><a href="{{ route('mngEmp') }}">check employee attendance</a></li>
                            <li><a href="#">employee</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>

