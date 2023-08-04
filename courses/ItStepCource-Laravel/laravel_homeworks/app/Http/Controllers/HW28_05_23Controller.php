<?php
namespace App\Http\Controllers;
use App\Models\HW28_05_23Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HW28_05_23Controller extends Controller
{
    public function show(Request $request)
    {
        return view('hw28_05_23_game', ['data_arr' => HW28_05_23Model::all()]);
    }
}
?>
