<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HW12_05_23Controller extends Controller
{
    public function hw12_05_23(){
        $country_arr = DB::select("SELECT * FROM HW_7_05_23_table_country");
        return view('hw_7_05_23_country',['country_arr'=>$country_arr]);
    }
    public function hw_12_05_23_city($id = 0){
        $city_arr = DB::select("SELECT * FROM HW_7_05_23_table_city WHERE HW_7_05_23_table_city.country_id = $id");
        return view('hw_7_05_23_city',['city_arr'=>$city_arr]);
    }
    public function hw_12_05_23_landmark($id = 0){
        $landmark_arr = DB::select("SELECT * FROM HW_7_05_23_table_landmark WHERE HW_7_05_23_table_landmark.city_id = $id");
        return view('hw_7_05_23_landmark',['landmark_arr'=>$landmark_arr]);
    }

    public function hw12_05_23_admin_panel(Request $request){
        $operation = $request->input('operation');
        $new_country = $request->input('new_country');
        $new_city = $request->input('new_city');
        $new_landmark = $request->input('new_landmark');
        $city_id = $request->input('city_id');
        $country_id = $request->input('country_id');
        $landmark_id = $request->input('landmark_id');


        if($operation == 'delete-country'){
            DB::delete("DELETE FROM HW_7_05_23_table_country WHERE HW_7_05_23_table_country.id = $country_id");
        }
        if($operation == 'add-country'){
            DB::insert("INSERT INTO HW_7_05_23_table_country(name) VALUES(?)",[$new_country]);
        }
        if($operation == 'edit-country'){
            DB::update("UPDATE HW_7_05_23_table_country SET name = ? WHERE HW_7_05_23_table_country.id = $country_id",[$new_country]);
        }


        if($operation == 'delete-city'){
            DB::delete("DELETE FROM HW_7_05_23_table_city WHERE HW_7_05_23_table_city.id = $city_id");
        }
        if($operation == 'add-city'){
            DB::insert("INSERT INTO HW_7_05_23_table_city(name, country_id) VALUES(?)",[$new_city,$country_id]);
        }
        if($operation == 'edit-city'){
            DB::update("UPDATE HW_7_05_23_table_city SET name = ? WHERE HW_7_05_23_table_country.id = $country_id",[$new_city]);
        }


        if($operation == 'delete-landmark'){
            DB::delete("DELETE FROM HW_7_05_23_table_landmark WHERE HW_7_05_23_table_landmark.id = $landmark_id");
        }
        if($operation == 'add-landmark'){
            DB::insert("INSERT INTO HW_7_05_23_table_landmark(name, city_id) VALUES(?)",[$new_city,$city_id]);
        }
        if($operation == 'edit-landmark'){
            DB::update("UPDATE HW_7_05_23_table_landmark SET name = ? WHERE HW_7_05_23_table_city.id = $city_id",[$new_landmark]);
        }
    }
}
