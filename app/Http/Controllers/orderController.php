<?php

namespace App\Http\Controllers;

use App\Models\order_detail;
use App\Models\Ingredient_name;
use App\Models\checkstock;
use Illuminate\Http\Request;

class orderController extends Controller
{

    public function toView()
    {
        return view('addlist');

    }

    public function orderlist()
    {
        $list = order_detail::all();

        $list = order_detail::orderBy('created_at', 'DESC')->get();
        $name = Ingredient_name::all();
        //$list = order_detail::with('Ingredient_names')->get();
        return view('addlist', compact('list', 'name'));



    }

    public function getOrder(Request $request)
    {

        $request->validate(['amount' => 'required|numeric|min:1|max:100']);

        // รับค่าจาก Request
        $name = $request->input('name');
        $amount = $request->input('amount');

        $new_order = new order_detail;
        $new_order->amount = $amount;
        $new_order->name_id = $name;
        $new_order->created_at = now();
        $new_order->updated_at = now();
        $new_order->save();



        $updatecheckstock = checkstock::where('name_id',$request->input('name'))->first();
        $updatecheckstock->total_stock += $request->amount;
        $updatecheckstock->save();

        return redirect('/order');

        $bringoutcheckstock = checkstock::where('name_id', $request->input('name'))->first();
        if ($bringoutcheckstock->total_stock > $bringoutcheckstock) {
        $bringoutcheckstock->total_stock -= $request->amount;
        $bringoutcheckstock->bringout_stock += $request->amount;
        $bringoutcheckstock->save();

        return redirect('/checkstock');
}
    }

    public function edit($id, $amount)
    {
        $edit = order_detail::find($id);
        $name = Ingredient_name::all();
        return view('editIngredient', compact('edit', 'name'));
    }

    public function update(Request $request)
    {
        $update = order_detail::find($request->id);
        $newId = $request->name;
        //$newName = $request->input('name_id');
        $newAmount = $request->amount;

        $update->name_id = $newId;
        //$update->name_id = $newName;
        $update->amount = $newAmount;
        $update->save();

        //ทำให้มันลบในฝั่งempด้วย
        $checkstock=Checkstock::where('name_id', $newId)->first();
        $checkstock->total_stock = $request->amount;
        $checkstock->save();

        $updatecheckstock = checkstock::where('name_id', $request->id)->first();
        $updatecheckstock->total_stock += $request->amount;
        $updatecheckstock->save();
        return redirect('/order');


        $bringoutcheckstock = checkstock::where('name_id', $request->input('name'))->first();
        if ($bringoutcheckstock->total_stock > $bringoutcheckstock) {
        $bringoutcheckstock->total_stock -= $request->amount;
        $bringoutcheckstock->bringout_stock += $request->amount;
        $bringoutcheckstock->save();

        return redirect('/checkstock');
}
    }


    public function deleteList($id)
    {
        $order = order_detail::find($id);

        $updatecheckstock = checkstock::where('name_id', $order->name_id)->first();
        if($updatecheckstock->total_stock < $order->amount){
            $message = 'เอาออกมาใช้สำเร็จ';
            echo "<script>alert('$message');</script>";
            echo "<script>
            setTimeout(function() {
                window.location.href = '/order'   ;
            }, 0);
        </script>";

        }else{
            $order->delete();
            $updatecheckstock->total_stock -= $order->amount;
            $updatecheckstock->save();
        }
        return redirect('./order');
    }

    public function viewstock()
    {
        $Ingredient_name = Ingredient_name::all();
        $checkstock = checkstock::all();
        $checkstock = checkstock::orderBy('name_id', )->get();

        return view("checkstock", ['checkstock' => $checkstock, 'Ingredient_name' => $Ingredient_name] );
    }
    public function updateStock(Request $request){
        $bringoutcheckstock = checkstock::where('name_id', $request->input('checkstock'))->first();
        if ($bringoutcheckstock->total_stock<   $request->input('amount')) {
            $message = 'จำนวนไม่ถูกต้อง';
            echo "<script>alert('$message');</script>";
            echo "<script>
            setTimeout(function() {
                window.location.href = '/checkstock'   ;
            }, 0);
        </script>";
        return;





        }
        else{
            $bringoutcheckstock->total_stock -= $request->amount;
            $bringoutcheckstock->bringout_stock += $request->amount;
            $bringoutcheckstock->save();
            $message = 'เอาออกมาใช้สำเร็จ';
            echo "<script>alert('$message');</script>";
            echo "<script>
            setTimeout(function() {
                window.location.href = '/checkstock'   ;
            }, 0);
        </script>";
        return;



                }
}
}
