<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        #topic{
            text-align: center;
            padding-top: 1em;
            font-size:30px;
        }
        #checklobtn{
            background-color: #A73B24;
            box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
            color: #fff;
            padding: 10px;
            border-radius: 9px;
            margin: 15px;
            color: rgb(255, 255, 255)        }
    #checkatbtn{
            background-color: #A73B24;
    box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
    color: #fff;
    padding: 10px;
    border-radius: 9px;
    margin: 15px;
    color: rgb(255, 255, 255);
    width: 20em;
}
 .container{
    margin: 3em;
 }
    </style>
</head>
<body>
    <x-appemp-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded shadow-lg">
                @if (session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
                @endif
                <h1 id="topic">check attendance</h1>
                <div class="container ">
                <form action="{{ route('checkattendance') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div  id="currentDateTime"></div>
                                <p>Latitude: <span id="latitude"></span></p>
                                <p>Longitude: <span id="longitude"></span></p>
                        </div>

                        <div class="col-6">
                            <label for="employee_id">รหัสพนักงาน</label>
                            <input type="text"  name="employee_id" id="employee_id">
                        </div>

                        <div class="col-6">
                    <label for="emp_id" class="block">ช่วงเวลาการทำงาน</label>
                    <select class="block appearance-none bg-white border border-gray-300 hover:border-gray-400 rounded w-64" name="time_type">
                        <option value="1">เช็คเข้างาน</option>
                        <option value="2">เช็คเวลาออกงาน</option>
                    </select>
                    <input type="hidden" id="latitude_input" name="latitude">
                    <input type="hidden" id="longitude_input" name="longitude">
                </div>
                    </div>
                </div>
                    <div class="flex justify-center items-center">
                    <button type="submit" id="checkatbtn">เช็คชื่อ</button>
                    </div>
                </form>
            <script>
                   function showLocation(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        document.getElementById('latitude').textContent = latitude;
        document.getElementById('longitude').textContent = longitude;

        // กำหนดค่าให้กับ input fields ที่มีชนิด "hidden" (ถ้ามีอยู่ใน HTML)
        const latitudeInput = document.getElementById('latitude_input');
        if (latitudeInput) {
            latitudeInput.value = latitude;
        }
        const longitudeInput = document.getElementById('longitude_input');
        if (longitudeInput) {
            longitudeInput.value = longitude;
        }
    }

    function showError(error) {
        console.error('Error getting location:', error);
    }

    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(showLocation, showError);
    } else {
        alert('Geolocation is not available in your browser.');
    }
                    function updateDateTime() {
                        const currentDateTime = new Date();
                        const formattedDateTime = currentDateTime.toLocaleString(); // You can format the date and time as needed

                        document.getElementById('currentDateTime').textContent = formattedDateTime;
                    }
                    updateDateTime();
                    setInterval(updateDateTime, 1000);
            </script>
                </div>
        </div>
    </x-appemp-layout>
</body>
</html>
