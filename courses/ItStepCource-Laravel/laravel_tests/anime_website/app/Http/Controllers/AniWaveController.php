<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AniWaveMainModel;
use App\Models\AniWaveWatchModel;
use Illuminate\Support\Facades\DB;

class AniWaveController extends Controller
{
    public function main_page(){
        return view('main_page',['data_arr'=>AniWaveMainModel::all()]);
    }

    public function search_title($search = ''){
        $ret_res = AniWaveMainModel::where('title_eng_name','LIKE','%'.$search.'%')
                                    ->orWhere('title_rus_name','LIKE','%'.$search.'%')
                                    ->orWhere('title_jp_name','LIKE','%'.$search.'%')
                                    ->orWhere('author','LIKE','%'.$search.'%')
                                    ->get();
        return view('search_page',['data'=>$ret_res]);
    }

    public function watch_title($title = ''){
        $data_arr = DB::select("SELECT * FROM $title");

        return view('watch_page',['data_arr'=>$data_arr]);
    }
}
