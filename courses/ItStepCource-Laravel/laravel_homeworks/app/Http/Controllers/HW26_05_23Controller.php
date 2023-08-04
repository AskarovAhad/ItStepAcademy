<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    use App\Models\Galery;

    class HW26_05_23Controller extends Controller{
        public function show(Request $request){
            $action = $request->input('action');
            if($action == 'insert'){
                $student_image_file = $request->file('file_img');
                $image_date = file_get_contents($student_image_file);
                $image_date_base64 = base64_encode($image_date);

                $galery = new Galery;
                $galery->image = $image_date_base64;
                $galery->save();
            }
            $galery_array = Galery::all();

            return view('hw26_05_23_show', ['galery_array'=>$galery_array]);
        }
    }
?>
