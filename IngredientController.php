<?php

namespace App\Http\Controllers;

use App\Models\Ingredient_list;
use App\Models\Ingredient_type;
use App\Models\UnitOfMeasurement;
use App\Models\Ingredient_name;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(){
        return view('addlist');
    }

    public function showAll(){
        $allname = Ingredient_name::all();
        $alltype = Ingredient_type::all();
        $allunit = UnitOfMeasurement::all();
        return view('addlist',compact('allname','alltype','allunit'));
    }

    //ดึงข้อมูลประวัติไปแสดง
    public function history(){
        $list = Ingredient_list::all();
        $list = Ingredient_list::with('ingredientType')->orderBy('created_at','DESC')->get();
        $list = Ingredient_list::with('unitOfMeasurement')->get();
        return view('history',compact('list'));
    }

    //รับข้อมูลเพื่อส่งไปยัง database
    public function addOrder(Request $request){
        //ตรวจ amount ให้น้อยสุดแค่ 1 มากสุด 100
        $request->validate(['amount' => 'required|numeric|min:1|max:100']);

        // รับค่าจาก Request
        $type = $request->input('type');
        $name = $request->input('name');
        $amount = $request->input('amount');
        $unit = $request->input('unit');

        //บันทึกข้อมูล
        $new_list = new Ingredient_list;
        $new_list -> name_list = $name;
        $new_list -> amount = $amount;
        $new_list->created_at = now();
        $new_list->updated_at = now();
        $new_list -> type_id = $type;
        $new_list -> unit_id = $unit;

        $new_list->save();
        return redirect ('./add');

    }


}
