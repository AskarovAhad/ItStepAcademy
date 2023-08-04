<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Подключения модели StudentsModel
use App\Models\StudentsModel;

use Barryvdh\DomPDF\Facade\Pdf;


use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends Controller
{
    //

    public function show(Request $request){

        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');
        $action = $request->input('action');

        $find_name = $request->input('find_name');

        $id = $request->input('id');


        // --- Добавления новый студентов ---
        if ($action == 'insert') {
            // dd($name);
            // $affected = DB::insert("INSERT INTO students_table (name, surname, age)
            // VALUES('$name', '$surname', '$age')");


            //Конструктор запросов
            // DB::table('students_table')->insert(['name' => $name, 'surname' => $surname, 'age' => $age]);


            // Создания новой записи в модели StudentsModel
            $student = new StudentsModel;

            $student->name = $name;
            $student->surname = $surname;
            $student->age = $age;

            $student->save();
            // ------------------


        }


        // ----  Редактирования имени студента ----
        if ($action == 'edit_name') {

            // Обновления записи в модели StudentsModel
            $student = StudentsModel::find($id);

            $student->name = $name;

            $student->save();
            // ------------------

        }



        // Запрос списка  студентов или поиск
        if ($action == 'find') {
            // $students_array = DB::select("SELECT * FROM students_table WHERE name like '%$find_name%'");

            //Конструктор запросов
            // $students_array = DB::table('students_table')->where('name', 'like', "%$find_name%")->get();

            //Поиск по имени в моделей "StudentsModel"
            $students_array = StudentsModel::where('name', 'like', "%$find_name%")->get();
        }
        else{
            // Запрос таблицы Студентов
            //$students_array = DB::select("SELECT * FROM students_table");

            //Конструктор запросов
            //$students_array = DB::table('students_table')->get();

            //Получение моделей StudentsModel
            // $students_array = StudentsModel::all();

            //Разбиение результатов Eloquent
            $students_array = StudentsModel::paginate(5);

            //dd($students_array[4]->group->group_name);


        }

        // print_r($students_array);

        // Шаблон  в `students.blade.php`
        return view('students', ['students_array' => $students_array ]);

    }



    public function edit( $id = 0 ){

        // $students_array = ['Kamron', 'Bilol', 'Hasan', 'Nikita' ];
        // $students_array = [
        //     ['name' => 'Kamron', 'surname'=> 'Alisherov', 'age' => 17 ],
        //     ['name' => 'Nikita', 'surname'=> 'Soy',       'age' => 17 ],
        //     ['name' => 'Ilon',   'surname' => 'Mask',     'age' => 45 ]
        // ];


        // -----------------------------
        // Запрос строки из таблицы Студентов
        $student = DB::select("SELECT * FROM students_table WHERE id=$id");
        //dd($student);
        if (isset($student)){
            // Шаблон  в `students.blade.php`
            return view('student_edit', ['student' => $student[0] ]);
        }
        else
        {
            echo 'Student Not Found !!!';
        }


    }


    // Функция сохранения файла изображения
    public function photo_upload(Request $request){

        $id = $request->input('id');
        $student_image_file =  $request->file('file_img');
        // dd($student_image_file);



        // --- Сохранения в БД ---

        // Получения содержания файла двоичный формат
        $image_data = file_get_contents($student_image_file);

        // Кодирования в Base64
        $image_data_base64 = base64_encode($image_data);

        // Сохранения в БД
        $student = StudentsModel::find($id);
        $student->image_file = $image_data_base64;
        $student->save();

        // --- Сохранения в файл ---
        // Папка для сохранения
        // $destination_path = public_path().'/student_images/';
        // $student_image_file_ext = $student_image_file->extension();
        // $student_image_file_name = 'photo_'.$id.'.'.$student_image_file_ext;
        // $student_image_file->move($destination_path, $student_image_file_name);

        return redirect('/students');

    }





    // REST API - Функции
    public function students_list( Request $request ){
        app('debugbar')->disable();
        //echo 'students_list - ok';
        //Получение моделей StudentsModel
        $students_array = StudentsModel::all();
        // $students_array = StudentsModel::limit(5)->get();


        // Отправка ответа в формате JSON
        return response()->json($students_array, 200);
    }



    public function student_show( Request $request, $id = 0 ){
        app('debugbar')->disable();
        // echo 'students_id = '.$id;
        //Получение моделей Студента по id
        $student = StudentsModel::find($id);
        // Отправка ответа в формате JSON
        if ($student)
            return response()->json($student, 200);
        else
            return response()->json($student, 404);
    }

    public function student_create( Request $request){

        app('debugbar')->disable();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');

        // Создания новой записи в модели StudentsModel
        $student = new StudentsModel;
        $student->name = $name;
        $student->surname = $surname;
        $student->age = $age;
        $student->save();
        // ------------------

        // Отправка ответа в формате JSON
        if ($student){
            return response()->json($student, 200);
        }
        else
        {
            return response()->json($student, 500);
        }
    }


    public function student_update( Request $request, $id = 0){
        app('debugbar')->disable();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');

        // Обновления записи в модели StudentsModel
        $student = StudentsModel::find($id);
        if ($student){
            $student->name = $name;
            $student->surname = $surname;
            $student->age = $age;
            $student->save();
        }
        // ------------------

        // Отправка ответа в формате JSON
        if ($student)
            return response()->json($student, 200);
        else
            return response()->json($student, 404);
    }


    public function student_delete( Request $request, $id = 0){
        app('debugbar')->disable();

        // Удаления записи в модели StudentsModel
        $student = StudentsModel::find($id);
        // ------------------

        // Отправка ответа в формате JSON
        if ($student){
            $student->delete();
            return response()->json($student, 200);
        }
        else{
            return response()->json($student, 404);
        }
    }



    // Экспорт в PDF функция
    public function export_pdf( Request $request ){
        app('debugbar')->disable();

        $students_array = StudentsModel::all();

        // проверка HTML формата
        //return view('students_pdf', ['students_array' => $students_array ]);

        // Экспорт в файлы PDF 'student.pdf'
        $pdf = PDF::loadView('students_pdf', ['students_array' => $students_array ]);
        return $pdf->download('students.pdf');

    }


    public function export_excel()
    {
        return Excel::download(new StudentsExport, 'Students.xlsx');
    }

}
