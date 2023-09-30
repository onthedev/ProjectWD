<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สั่งวัตถุดิบ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="{{ asset('order.css') }}">

</head>
<body>

    <div class="container">
    <br><h2>สั่งวัตถุดิบ</h2>
    <form action="/order/add" method="POST">
        @csrf
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ชื่อวัตถุดิบ</th>
                        <th >จำนวน</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-select" name="name" id="name" required>
                                @foreach ($name as $allnames)
                                    <option value="{{$allnames->id}}">{{$allnames->name_th}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="form-control-center" type="number" id="amount" name="amount" min="1" max="100" value="1">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="สั่งวัตถุดิบ" id="submitBtn">
    </form>

    <br><h2>รายการสั่งวัตถุดิบ</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ชื่อวัตถุดิบ</th>
                <th>จำนวนที่สั่ง</th>
                <th>วันเวลาที่สั่ง</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $lists)
            <tr>
                <td>{{$lists->Ingredient_names->name_th}}</td>
                <td>{{$lists->amount}}</td>
                <td>{{$lists->updated_at}}</td>
                <td><a class="btn btn-warning" href="order/edit/{{$lists->id}}/{{$lists->amount}}">Edit</a></td>
                <td><a class="btn btn-danger" href="/order/delete/{{$lists->id}}" onclick="return confirm('คุณต้องการลบรายการนี้ใช่หรือไม่')">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


</body>
</html>
