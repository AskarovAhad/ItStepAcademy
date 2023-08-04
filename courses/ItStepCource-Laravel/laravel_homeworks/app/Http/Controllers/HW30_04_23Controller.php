<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HW30_04_23Controller extends Controller
{
    public function hw30_04_23(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $id = $request->input('id');
        $find_article = $request->input('find_acticle');
        $action = $request->input('action');


        $article_arr = DB::select("SELECT * FROM HW_28_04_23_table");
        if($action == 'insert'){
            DB::insert('INSERT INTO HW_28_04_23_table (title, content) VALUES (?, ?)', [$title, $content]);
            $article_arr = DB::select("SELECT * FROM HW_28_04_23_table");
        }
        else if($action == 'edit'){
            DB::update("UPDATE HW_28_04_23_table set content = '$content' where id = '$id'");
            $article_arr = DB::select("SELECT * FROM HW_28_04_23_table");
        }
        else if($action == 'del'){
            DB::delete("DELETE FROM HW_28_04_23_table WHERE id = $id");
            $article_arr = DB::select("SELECT * FROM HW_28_04_23_table");
        }
        else if($action == 'find_acticle'){
            $article_arr = DB::select("SELECT * FROM HW_28_04_23_table WHERE content LIKE '%$find_article%'");
        }
        else $article_arr = DB::select("SELECT * FROM HW_28_04_23_table");
        return view('article_hw30_04_23',['article_arr' => $article_arr]);
    }
}

?>
