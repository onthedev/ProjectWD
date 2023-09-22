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
        @import url( {{asset('css/style.css')}});
    </style>
</head>
<body>
    <script>
        function showAmphoes() {
            let input_province = document.querySelector("#input_province");
            let url = "{{ url('/api/amphoes') }}?province=" + input_province.value;
            console.log(url);
            // if(input_province.value == "") return;
            fetch(url)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_amphoe = document.querySelector("#input_amphoe");
                    input_amphoe.innerHTML = '<option value="">กรุณาเลือกเขต/อำเภอ</option>';
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.amphoe;
                        option.value = item.amphoe;
                        input_amphoe.appendChild(option);
                    }
                    //QUERY AMPHOES
                    showTambons();
                });
        }
    function showTambons() {
            let input_province = document.querySelector("#input_province");
            let input_amphoe = document.querySelector("#input_amphoe");
            let url = "{{ url('/api/tambons') }}?province=" + input_province.value + "&amphoe=" + input_amphoe.value;
            console.log(url);
            // if(input_province.value == "") return;
            // if(input_amphoe.value == "") return;
            fetch(url)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_tambon = document.querySelector("#input_tambon");
                    input_tambon.innerHTML = '<option value="">กรุณาเลือกแขวง/ตำบล</option>';
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.tambon;
                        option.value = item.tambon;
                        input_tambon.appendChild(option);
                    }
                    //QUERY AMPHOES
                    showZipcode();
                });
        }
    function showZipcode() {
            let input_province = document.querySelector("#input_province");
            let input_amphoe = document.querySelector("#input_amphoe");
            let input_tambon = document.querySelector("#input_tambon");
            let url = "{{ url('/api/zipcodes') }}?province=" + input_province.value + "&amphoe=" + input_amphoe.value + "&tambon=" + input_tambon.value;
            console.log(url);
            // if(input_province.value == "") return;
            // if(input_amphoe.value == "") return;
            // if(input_tambon.value == "") return;
            fetch(url)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_zipcode = document.querySelector("#input_zipcode");
                    input_zipcode.value = "";
                    for (let item of result) {
                        input_zipcode.value = item.zipcode;
                        break;
                    }
                });
    }
    //EVENTS
        document.querySelector('#input_province').addEventListener('change', (event) => {
            showAmphoes();
        });
        document.querySelector('#input_amphoe').addEventListener('change', (event) => {
            showTambons();
        });
        document.querySelector('#input_tambon').addEventListener('change', (event) => {
            showZipcode();
        });
    </script>
    <form action="{{ route('addTeam') }}" method="post">
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
                </div>
                    <div class="container bg-white mt-5">
                        <h2 class="text-custom-size">เพิ่มพนักงาน</h2>
                        <div class="row">
                            <div class="col-6">
                                <h3 class="h3-header">ข้อมูลส่วนตัว</h3>
                                <label for="fname">first name:</label><br>
                                <input  class="indented-input" type="text" name="fname" id="fname">
                            </div>
                            <div class="col-6">
                                <h3 class="h3-header">&nbsp;</h3>
                                <label for="lname">last name:</label><br>
                                <input  class="indented-input" type="text" name="lname" id="lname">
                            </div>
                            <div class="col-6">
                                <label for="emp_id">รหัสพนักงาน:</label><br>
                                <input  class="indented-input" type="text" name="emp_id" id="emp_id">
                            </div>
                            <div class="col-6">
                                <label for="salary">Salary:</label><br>
                                <input class="indented-input" type="text" name="salary" id="salary">
                            </div>
                            <div class="col-12">
                                <label for="tel">tel no.:</label><br>
                                <input class="indented-input" type="tel" name="tel" id="tel">
                            </div>
                            <div class="col-6">
                                <h3 class="h3-header">Address</h3>
                                <label>บ้านเลขที่:</label><br>
                                <input  class="indented-input" type="text" name="homeID" id="homeID">
                            </div>
                            <div class="col-6">
                                <h3 class="h3-header">&nbsp;</h3>
                                <label>หมู่บ้าน:</label><br>
                                <input  class="indented-input" type="text" name="villagename" id="villagename">
                            </div>
                            <div class="col-6">
                                <label>ตำบล:</label><br>
                                <input  class="indented-input" type="text" name="Tambon" id="Tambon">
                            </div>
                            <div class="col-6">
                                <label>อำเภอ:</label><br>
                                <input  class="indented-input" type="text" name="amphoe" id="amphoe">
                            </div>
                            <div class="col-6">
                                <label>จังหวัด:</label><br>
                                <input  class="indented-input" type="text" name="changwat" id="changwat">
                            </div>
                            <div class="col-6">
                                <label>เลขไปรษณีย์:</label><br>
                                <input  class="indented-input" type="text" name="zipcode" id="zipcode">
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                        <button class="btn btn-primary subbtn">
                            เพิ่มข้อมูลพนักงาน
                          </button>
                        </div>
                    </div>
            </div>
        </div>

        </form>
    </x-app-layout>

</body>
</html>
