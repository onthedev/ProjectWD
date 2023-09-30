<!DOCTYPE html>
<html lang="en">
<head>
    <!-- หัวข้อและลิงค์ไฟล์ CSS -->
</head>
<body>
    <h2>แก้ไขข้อมูลวัตถุดิบ</h2>
    <form action="/order/update" method="POST">
        @csrf

        <input type="text" name="id" id="id" value="{{$edit->id}}" hidden>
        <table>
            <tr>
                <td>ชื่อวัตถุดิบ</td>
                <td>
                    <select name="name" id="name">
                        @foreach ($name as $names)
                            <option value={{$names->id}}>{{$names->name_th}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>จำนวน</td>
                <td><input type="number" id="amount" name="amount" min="1" max="100" value="{{ $edit->amount }}"></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="บันทึกข้อมูล">
    </form>
</body>
</html>
