<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\HW21_05_23Model;

class HW21_05_23Controller extends Controller
{
    public function article_list (){
        $articles_arr = HW21_05_23Model::get();
        return $articles_arr ? response()->json($articles_arr, 200) : response()->json($articles_arr, 404);
    }
    public function article_create(Request $request){

        $articles = new HW21_05_23Model;
        $id = $request->input('id');
        $title = $request->input('title');
        $content = $request->input('content');

        $articles->id = $id;
        $articles->title = $title;
        $articles->content = $content;
        $articles->save();

        return $articles ? response()->json($articles, 200) : response()->json($articles, 500);
    }
    public function article_update(Request $request, $id = 0){
        $articles = HW21_05_23Model::find($id);

        $id = $request->id;
        $title = $request->title;
        $content = $request->content;

        if (!$articles) return response()->json($articles, 404);
        $articles->id = $id;
        $articles->title = $title;
        $articles->content = $content;
        $articles->save();
        if($articles) return response()->json($articles, 200);
    }
    public function article_delete($id = 0){
        $article = HW21_05_23Model::find($id);
        return $article ? $article->delete() : response()->json($article, 404);
    }
    public function article_find(Request $request){
        $search = $request->search;
        $articles = HW21_05_23Model::where('content', 'like', "%$search%")->get();

        return $articles ? response()->json($articles, 200) :  response()->json($articles, 404);
    }

}
