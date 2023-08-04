<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HW28_04_23Comtroller extends Controller
{
    public function hw28_04_23()
    {
        $article_arr = DB::select("SELECT * FROM HW_28_04_23_table");
        return view('article_hw28_04_23',['article_arr' => $article_arr]);
    }
}

?>
