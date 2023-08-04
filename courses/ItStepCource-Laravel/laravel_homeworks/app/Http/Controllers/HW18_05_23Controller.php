<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Eloquent;



class HW18_05_23Controller extends Controller
{
    public function hw18_05_23(){
        return view('hw18_05_23',['address_arr' => DB::select("SELECT * FROM HW18_05_23_table")]);
    }

    public function hw18_05_23_search(Request $request){
        $search = $request->action;
        $address_arr = NULL;
        if($search == 'name'){
            $address_arr = DB::select("SELECT * FROM HW18_05_23_table WHERE HW18_05_23_table.name LIKE '%$request->name%'");
        }

        else if($search == 'surname'){
            $address_arr = DB::select("SELECT * FROM HW18_05_23_table WHERE HW18_05_23_table.surname LIKE '%$request->surname%'");
        }

        else if($search == 'phone'){
            $address_arr = DB::select("SELECT * FROM HW18_05_23_table WHERE HW18_05_23_table.phone LIKE '%$request->phone%'");
        }

        else if($search == 'home_addr'){
            $address_arr = DB::select("SELECT * FROM HW18_05_23_table WHERE HW18_05_23_table.addr LIKE '%$request->addr%'");
        }
        return view('hw18_05_23',['address_arr' => $address_arr]);
    }
}
