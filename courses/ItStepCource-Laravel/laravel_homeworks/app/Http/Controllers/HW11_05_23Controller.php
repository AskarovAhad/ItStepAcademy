<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Eloquent;



class HW11_05_23Controller extends Controller
{
    public function hw11_05_23_categories(){
        return view('hw_11_05_23_categories',['categories_arr' => DB::select("SELECT * FROM HW_11_05_23_categories_table")]);
    }

    public function hw11_05_23_category_show($id = 0){
        return view('hw_11_05_23_category_show',['category_show_arr' => DB::select("SELECT * FROM HW_11_05_23_category_show_table WHERE HW_11_05_23_category_show_table.category_id = $id ORDER BY add_date fddDESC")]);
    }
    public function hw11_05_23_new_post(Request $request){
        $s = $request->input('category_id');
        DB::insert('INSERT INTO HW_11_05_23_category_show_table (name, category_id, add_date) VALUES (?, ?, ?)', [$request->input('title'), $request->input('category_id'), date('Y-m-d')]);
        return redirect("http://localhost/laravel_homeworks/public/hw11_05_23/category_show/$s");
    }
}
