<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('history') }}">ประวัติการสั่งซื้อ</a>
                <a href="{{ route('toAddList') }}">สั่งซื้อวัตถุดิบ</a>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
