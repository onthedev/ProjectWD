<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สั่งวัตถุดิบ</title>
    <style>
        table,th,td
        {
            border: 2px solid black;
            border-collapse: collapse;
            padding: 4px;
        }
        table{
            width: 400px;
        }
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>

</head>
<body>
    <x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <a href="{{ route('toIngredient') }}">
        <img class="back-icon" width="30" height="30" src="{{ asset('pics/back-icon.svg') }}" alt="Your SVG Image">
    </a>
    <h2>สั่งวัตถุดิบ</h2>
    <form action="{{route('addOrder')}}" method="POST">
        @csrf
            <table>
                <tr>
                    <th>ประเภท</th>
                    <th>ชื่อวัตถุดิบ</th>
                    <th>จำนวน</th>
                    <th>หน่วยวัด</th>
                </tr>
                <tr>
                    <td>
                        <select name="type" id="type" required>
                            <option value=1>เนื้อ</option>
                            <option value=2>หมู</option>
                            <option value=3>ไก่</option>
                            <option value=4>อาหารทะเล</option>
                            <option value=5>ผัก</option>
                            <option value=6>ผลไม้</option>
                            <option value=7>ของหวาน</option>
                            <option value=8>เครื่องดื่ม</option>
                        </select>
                    </td>
                    <td>
                        <select name="name" id="name" required>
                            <optgroup label="เนื้อ">
                                <option value="ribeye">ริบอาย</option>
                                <option value="oyster blade">ใบพาย</option>
                                <option value="beef sirloin">สันนอก</option>
                                <option value="beef tenderloin">สันใน</option>
                                <option value="Picanha">โคขุน</option>
                            </optgroup>
                            <optgroup label="หมู">
                                <option value="streaky pork">สามชั้น</option>
                                <option value="pork loin">สันนอก</option>
                                <option value="pork tenderloin">สันใน</option>
                                <option value="pork shoulder">สันคอ</option>
                                <option value="bacon">เบคอน</option>
                            </optgroup>
                            <optgroup label="ไก่">
                                <option value="chicken breast">อกไก่</option>
                                <option value="marinated chicken">ไก่หมัก</option>
                            </optgroup>
                            <optgroup label="อาหารทะเล">
                                <option value="shrimp">กุ้ง</option>
                                <option value="cuttlefish">หมึกกระดอง</option>
                                <option value="dollyfish">ปลาดอลลี่</option>
                                <option value="jellyfish">แมงกะพรุน</option>
                                <option value="mussels">หอยแมลงภู่</option>
                            </optgroup>
                            <optgroup label="ผัก">
                                <option value="water spinach">ผักบุ้ง</option>
                                <option value="bok choy">ผักกวางตุ้ง</option>
                                <option value="napa cabbage">ผักกาดขาว</option>
                                <option value="wakame">สาหร่ายวากาเมะ</option>
                                <option value="corn">ข้าวโพด</option>
                                <option value="carrot">แครอท</option>
                                <option value="eryngii">เห็ดออรินจิ</option>
                                <option value="goldenneedlemushroom">เห็ดเข็มทอง</option>
                            </optgroup>
                            <optgroup label="ผลไม้">
                                <option value="watermelon">แตงโม</option>
                                <option value="pineapple">สัปปะรด</option>
                            </optgroup>
                            <optgroup label="ไอศกรีม">
                                <option value="rainbow ice cream">ไอศกรีมรสเรนโบว์</option>
                                <option value="chocolatechip ice cream">ไอศกรีมรสช็อคชิพ</option>
                                <option value="lemon ice cream">ไอศกรีมรสมะนาว</option>
                                <option value="chocolate ice cream">ไอศกรีมรสช็อคโกแลต</option>
                                <option value="strawberry ice cream">ไอศกรีมรสสตอเบอรี่</option>
                            </optgroup>
                            <optgroup label="เครื่องดื่ม">
                                <option value="watar">น้ำเปล่า</option>
                                <option value="coca cola">โค้ก</option>
                                <option value="tea">ชา</option>
                                <option value="fruit punch">ฟรุตพั้นช์</option>
                                <option value="blue hawaii">บลูฮาวาย</option>
                            </optgroup>
                        </select>
                    </td>
                    <td>
                        <input type="number" id="amount" name="amount" min="1" max="100" value="1">
                    </td>
                    <td>
                        <select name="unit" id="unit">
                            <option value=1>กิโลกรัม</option>
                            <option value=2>กรัม</option>
                            <option value=3>แพ็ค</option>
                            <option value=4>กล่อง</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="สั่งวัตถุดิบ" id="submitBtn" >
    </form>

    <script>
        const typeSelect = document.getElementById('type');
        const nameSelect = document.getElementById('name');
        const unitSelect = document.getElementById('unit');
        const amountInput = document.getElementById('amount');
        const submitBtn = document.getElementById('submitBtn');

    // ใส่ Event Listener เพื่อตรวจสอบเมื่อมีการเปลี่ยนแปลงค่า
        [typeSelect, nameSelect, unitSelect, amountInput].forEach(element => {
        element.addEventListener('change', changeTonumber);
    });
        function changeTonumber() {

            const selectedType = typeSelect.value;
            const selectedName = nameSelect.value;
            const selectedUnit = unitSelect.value;

            // เพิ่มตัวแปรเพื่อไว้แปลงค่าเป็นตัวเลขเพื่อใช้ในการเช็คเงื่อนไข
            let typeNumber = 0;
            let nameNumber = 0;

            if (selectedType === '1') {
                typeNumber = 1;
            } else if (selectedType === '2') {
                typeNumber = 2;
            } else if (selectedType === '3') {
                typeNumber = 3;
            } else if (selectedType === '4') {
                typeNumber = 4;
            } else if (selectedType === '5') {
                typeNumber = 5;
            } else if (selectedType === '6') {
                typeNumber = 6;
            } else if (selectedType === '7') {
                typeNumber = 7;
            } else if (selectedType === '8') {
                typeNumber = 8;
            }

            if (selectedName === 'ribeye' || selectedName === 'oyster blade' || selectedName === 'beef sirloin' || selectedName === 'beef tenderloin' || selectedName === 'Picanha') {
                nameNumber = 1;
            }
            else if (selectedName === 'streaky pork' || selectedName === 'pork loin' || selectedName === 'pork tenderloin' || selectedName === 'pork shoulder' || selectedName === 'bacon') {
                nameNumber = 2;
            }
            else if (selectedName === 'chicken breast' || selectedName === 'marinated chicken') {
                nameNumber = 3;
            }
            else if (selectedName === 'shrimp' || selectedName === 'cuttlefish' || selectedName === 'dollyfish' || selectedName === 'jellyfish' || selectedName === 'mussels') {
                nameNumber = 4;
            }
            else if (selectedName === 'water spinach' || selectedName === 'bok choy' || selectedName === 'napa cabbage' || selectedName === 'wakame' || selectedName === 'corn' || selectedName === 'carrot' || selectedName === 'eryngii' || selectedName === 'golden needle mushroom') {
                nameNumber = 5;
            }
            else if (selectedName === 'watermelon' || selectedName === 'pineapple') {
                nameNumber = 6;
            }
            else if (selectedName === 'rainbow ice cream' || selectedName === 'chocolatechip ice cream' || selectedName === 'lemon ice cream' || selectedName === 'chocolate ice cream' || selectedName === 'strawberry ice cream') {
                nameNumber = 7;
            }
            else if (selectedName === 'water' || selectedName === 'coca cola' || selectedName === 'tea' || selectedName === 'fruit punch' || selectedName === 'blue hawaii') {
                nameNumber = 8;
            }

            // เช็คเงื่อนไขและปิดหรือเปิดปุ่ม submit ตามเงื่อนไข
            if ((selectedUnit === '1' || selectedUnit === '2') && (typeNumber === 1 && nameNumber === 1)) {
                submitBtn.removeAttribute('disabled');
            }
            else if ((selectedUnit === '1' || selectedUnit === '2') && (typeNumber === 2 && nameNumber === 2)) {
                submitBtn.removeAttribute('disabled');
            }
            else if ((selectedUnit === '1' || selectedUnit === '2') && (typeNumber === 3 && nameNumber === 3)) {
                submitBtn.removeAttribute('disabled');
            }
            else if ((selectedUnit === '1' || selectedUnit === '2') && (typeNumber === 4 && nameNumber === 4)) {
                submitBtn.removeAttribute('disabled');
            }
            else if ((selectedUnit === '1' || selectedUnit === '2') && (typeNumber === 5 && nameNumber === 5)) {
                submitBtn.removeAttribute('disabled');
            }
            else if ((selectedUnit === '1' || selectedUnit === '2') && (typeNumber === 6 && nameNumber === 6)) {
                submitBtn.removeAttribute('disabled');
            }
            else if (selectedUnit === '3' && typeNumber === 8 && nameNumber === 8) {
                submitBtn.removeAttribute('disabled');
            }
            else if (selectedUnit === '4' && typeNumber === 7 && nameNumber === 7) {
                submitBtn.removeAttribute('disabled');
            }
            else {
                submitBtn.setAttribute('disabled', 'disabled');
            }
        }
    </script>
    </div>
    </div>
</x-app-layout>
</body>
</html>
