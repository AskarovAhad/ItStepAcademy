<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Eloquent;



class HW7_05_23Controller extends Controller
{
    public function hw7_05_23(){
        $country_arr = DB::select("SELECT * FROM HW_7_05_23_table_country");
        return view('hw_7_05_23_country',['country_arr'=>$country_arr]);
    }
    public function hw_7_05_23_city($id = 0){
        $city_arr = DB::select("SELECT * FROM HW_7_05_23_table_city WHERE HW_7_05_23_table_city.country_id = $id");
        return view('hw_7_05_23_city',['city_arr'=>$city_arr]);
    }
    public function hw_7_05_23_landmark($id = 0){
        $landmark_arr = DB::select("SELECT * FROM HW_7_05_23_table_landmark WHERE HW_7_05_23_table_landmark.city_id = $id");
        return view('hw_7_05_23_landmark',['landmark_arr'=>$landmark_arr]);
    }
}
