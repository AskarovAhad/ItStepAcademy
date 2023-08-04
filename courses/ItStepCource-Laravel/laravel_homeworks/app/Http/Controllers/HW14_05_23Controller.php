<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HW14_05_23Controller extends Controller
{
    public function hw14_05_23_dishes(){
        return view('hw14_05_23_dishes',['dishes_arr'=>DB::select("SELECT * FROM HW_14_05_23_dishes_table")]);
    }

    public function hw14_05_23_dish($id = 0){
        return view('hw14_05_23_dish',['dish_arr'=>DB::select("SELECT * FROM HW_14_05_23_dishes_table WHERE HW_14_05_23_dishes_table.id = $id")]);
    }
}
