<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Eloquent;

class HW4_04_23Controller extends Controller
{
    public function hw4_04_23(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $id = $request->input('id');
        $find_article = $request->input('find_acticle');
        $action = $request->input('action');


        if($action == 'insert'){
            $article_arr = new Eloquent;
            $article_arr->title = $title;
            $article_arr->content = $content;
            $article_arr->save();
            $article_arr = Eloquent::all();
        }
        else if($action == 'edit'){
            $article_arr = Eloquent::find($id);
            $article_arr->content = $content;
            $article_arr->save();
            $article_arr = Eloquent::all();
        }
        else if($action == 'del'){
            $article_arr = Eloquent::find($id);
            $article_arr->delete();
            $article_arr = Eloquent::all();
        }
        else if($action == 'find_acticle'){
            $article_arr = Eloquent::all()->where('content', $find_article);
        }
        else $article_arr = Eloquent::all();

        return view('article_hw4_04_23',['article_arr' => $article_arr]);
    }
}

?>
