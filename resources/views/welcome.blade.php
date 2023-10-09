<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Young+Serif&display=swap" rel="stylesheet">
    <title>Prasit Shabu</title>
    <style>
        @import url( {{asset('css/welcome.css')}});
    </style>
</head>

<body class="antialiased">
    <div
        class="relative lg:flex lg:justify-center lg:items-center lg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
        <div class="container text-center bg-white rounded-5 p-5 shadow-2xl bgcenter">
            @if (Route::has('login'))
                <div class="lg:fixed lg:top-0 lg:right-0 text-center z-10 bg-white">
                    @auth
                    <img id="logo" src="{{ asset('pics/prasitlogo.svg') }}" alt="Alternative Text">
                        <h1 id="topic">Welcome to Prasit Shabu</h1>
                        <p>Prasit Co., Ltd.,</p>
                        <p id="greetuser">สวัสดี, คุณ&nbsp;<span class="user_name">{{ auth()->user()->name }}</span></p>

                        <p id="login_status">คุณได้ทำการเข้าสู่ระบบแล้ว</p>
                        <a class="btn" href="{{ url('/dashboard') }}">เข้าสู่การใช้งาน</a>
                    @else
                        <img id="logo" src="{{ asset('pics/prasitlogo.svg') }}" alt="Alternative Text">
                        <h1 id="topic">Welcome to Prasit Shabu</h1>
                        <p>Prasit Co., Ltd.,</p>
                        <p id="login_status">คุณยังไม่ได้ทำการเข้าสู่ระบบ</p>
                        <a id="notlogin" class="btn" href="{{ route('login') }}">เข้าสู่ระบบ</a>

                        @if (Route::has('register'))
                            <a id="notlogin" class="btn" href="{{ route('register') }}">สมัครสมาชิก</a>
                        @endif
                    @endauth
            @endif
        </div>
    </div>
    </div>

</body>

</html>
