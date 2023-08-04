<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HW25_05_23Controller extends Controller
{
    public function show(){
        return view('hw25_05_23_show',['posts_arr' => DB::select('SELECT * FROM HW25_05_23_table')]);
    }

    public function newpost(Request $request){
        $last_id = json_decode(json_encode(DB::table('HW25_05_23_table')->select('id')->orderByDesc('id')->first()),true);
        var_dump($last_id['id']);
        $imageName = 'post_image_'.($last_id['id'] + 1).'.'.$request->image->extension();
        echo $imageName;
        $request->image->move(public_path('post_images'), $imageName);
        DB::insert('INSERT INTO HW25_05_23_table (name, img) values (?, ?)', [$request->name, $imageName]);

        return back();
    }
}


?>
