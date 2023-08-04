<?php

namespace App\Http\Controllers;

use App\Models\StudentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //для бд


class StudentsController extends Controller
{
    public function show(Request $request){
        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');
        $action = $request->input('action');
        $find_name = $request->input('find_name');
        $id = $request->input('id');

        if($action == 'edit_name'){
            $student = StudentsModel::find($id);
            $student->name = $name;
            $student->save();
        }
        if($action == 'insert'){
            // DB::table('students_table')->insert(array('name'=>$name, 'surname'=>$surname, 'age'=>$age));
            $student->name = $name;
            $student->surname = $surname;
            $student->age = $age;
            $student->save();
        }
        if($action == 'find') $students_array = StudentsModel::where('name', 'like', "%$find_name%")->get();
        else $students_array = StudentsModel::paginate(5);

        $request->flash();
        return view('students', ['students_array' => $students_array ]);
    }

    public function edit( $id = 0 ){
        // $students_array = ['Kamron', 'Bilol', 'Hasan', 'Nikita' ];
        $students_array = [
            ['name' => 'Kamron', 'surname'=> 'Alisherov', 'age' => 17 ],
            ['name' => 'Nikita', 'surname'=> 'Soy',       'age' => 17 ],
            ['name' => 'Ilon',   'surname' => 'Mask',     'age' => 45 ]
        ];

        if (isset($students_array[$id])){
            $student = $students_array[$id];
            // Шаблон  в `students.blade.php`
            return view('student_edit', ['student' => $student ]);
        }
        else
        {
            echo 'Student Not Found !!!';
        }
    }
}
