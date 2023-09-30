<?php

namespace App\Http\Controllers;
use App\Models\order_detail;
use App\Models\Ingredient_name;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function toView(){
        return view ('addlist');
    }

    public function orderlist(){
        $list = order_detail::all();
        $list = order_detail::orderBy('created_at', 'DESC')->get();
        $name = Ingredient_name::all();
        //$list = order_detail::with('Ingredient_names')->get();
        return view('addlist',compact('list','name'));
    }

    public function getOrder(Request $request){

        $request->validate(['amount' => 'required|numeric|min:1|max:100']);

        // รับค่าจาก Request
        $name = $request->input('name');
        $amount = $request->input('amount');

        $new_order = new order_detail;
        $new_order -> amount = $amount;
        $new_order -> name_id = $name;
        $new_order->created_at = now();
        $new_order->updated_at = now();

        $new_order->save();

        return redirect ('/order');

    }

    public function edit($id,$amount){
        $edit = order_detail::find($id);
        $name = Ingredient_name::all();
        return view('editIngredient', compact('edit','name'));
    }

    public function update(Request $request){
        $update = order_detail::find($request->id);
        $newId = $request->name;
        //$newName = $request->input('name_id');
        $newAmount = $request->amount;

        $update->name_id = $newId;
        //$update->name_id = $newName;
        $update->amount = $newAmount;
        $update->save();

        return redirect('/order');
    }
    public function deleteList($id){
        $order = order_detail::find($id);
        $order->delete();
        return redirect('./order');
    }


}
