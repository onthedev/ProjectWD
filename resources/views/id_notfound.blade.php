<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* CSS สำหรับจัดเนื้อหาอยู่กึ่งกลางทั้งแนวนอนและแนวตั้ง */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">เกิดข้อผิดพลาดในการบันทึกข้อมูล</h5>
              <p class="card-text">รหัสพนักงานไม่ถูกต้อง</p>
              <p class="card-text">รหัส {{ $employeeId }} ไม่มีอยู่ในระบบ</p>
              <a href="{{ route('tocheckattendance') }}" class="btn btn-primary">กลับสู่หน้าเช็คชื่อ</a>
            </div>
          </div>
    </div>
</body>
</html>
