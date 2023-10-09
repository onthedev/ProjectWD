<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMP | Checkstock</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="{{ asset('css/checkstock.css') }}"></head>
<body>
    <x-appemp-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                        <br>
                        <h2>CheckStockวัตถุดิบ</h2>
                        <form action="{{route('updateStock')}}" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ชื่อวัตถุดิบ</th>
                                            <th>จำนวน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-select" name="checkstock" id="checkstock" required>
                                                    @foreach ($Ingredient_name as $name )
                                                     <option value="{{$name ->id}}">{{$name->name_th}}</option>
                                                    @endforeach

                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control-center" type="number" id="amount" name="amount"
                                                    min="1" max="100" value="1">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <input type="submit"  value="เอาออกมาใช้" id="submitBtn">



                        </form>


                        <br>
                        <h2>รายการสั่งวัตถุดิบ</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>เลขที่</th>
                                    <th>ชื่อวัตถุดิบ (ภาษาอังกฤษ)</th>
                                    <th>ชื่อวัตถุดิบ (ภาษาไทย)</th>
                                    <th>ในสต๊อก</th>
                                    <th>เอาออกมาใช้</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkstock as $stock)
                                    <tr>
                                        <td>{{ $stock->name_id }}</td>
                                        @for ($i = 0; $i < count($Ingredient_name); $i++)
                                        @if ($stock->checkstock_id == $Ingredient_name[$i]->id)
                                            <td>{{ $Ingredient_name[$i]->name_eng }}</td>
                                            <td>{{ $Ingredient_name[$i]->name_th }}</td>
                                        @endif
                                        @endfor
                                        <td>{{ $stock->total_stock}}</td>
                                        <td>{{ $stock->bringout_stock}}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                </body>
                </div>
            </div>
        </div>
    </x-appemp-layout>
</body>
</html>



