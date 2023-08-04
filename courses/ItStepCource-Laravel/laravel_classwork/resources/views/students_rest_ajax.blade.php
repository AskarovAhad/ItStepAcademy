
{{-- Макеты страницы --}}
@extends('app_layout')


{{-- Содержания страницы --}}
@section('content')

<h4> Пользователь:
    @auth
     {{-- Пользователь аутентифицирован ... --}}
    {{ Auth::user()->name }}
    @endauth
    @guest
        {{-- Пользователь не аутентифицирован ... --}}
        [гость]
    @endguest
</h4>

<!-- AJAX JS  -->
<script>

$( document ).ready(function() {
    ajax_students_list()
});



// GET Students JSON from REST API
function ajax_students_list(){
    $.ajax({
        method: "GET",
        url: "http://laravel8/api/students",
        data: { },
        contentType: "application/json",
        dataType : "json",
        beforeSend: function (){
            console.log('beforeSend AJAX');
            $('#table').html('Loading ......');
        }
    })
    .done(function( json_data ) {
        // alert( json_data[2].name );

        let table;
        table='<table>';
        table+='<tr>';
        table+='<th>Name</th> <th>Surname</th> <th>Age</th>';
        table+='<th>Edit</th> <th>Delete</th>';
        table+='</tr>';

        $.each(json_data, function( index, student ) {
            //alert( index + ": " + student.name );

            table+='<tr>';
            // Student name input
            table+='<td>'+student.name
                 +'<input type="text" id="new_name_'+student.id+'" size="10" value="'+student.name+'">';
                 +'</td>';
            // Student Surname input
            table+='<td>'+student.surname
                 +'<input type="text" id="new_surname_'+student.id+'" size="10" value="'+student.surname+'">';
                 +'</td>';
            // Student Age input
            table+='<td>'+student.age
                 +'<input type="text" id="new_age_'+student.id+'" size="10" value="'+student.age+'">';
                 +'</td>';
            // Edit Button
            table+='<td><input type="button" value="Edit" onclick="ajax_student_edit('+student.id+')"></td>';
            // Delete Button
            table+='<td><input type="button" value="Delete" onclick="ajax_student_delete('+student.id+')"></td>';

            table+='</tr>';
        });

        table+='</table>';

        $('#table').html(table);

    });
}


// Get Insert Into Students Table with AJAX
function ajax_student_create(){

    let name = $('#name').val();
    let surname = $('#surname').val();
    let age = $('#age').val();

    // alert(name); // return;

    // Insert into table from HTML form  to AJAX
    $.ajax({
        method: "POST",
        url: "/api/student_create",
        contentType: "application/json; charset=UTF-8",
        dataType: "json",
        data: JSON.stringify({ name : name,
                               surname : surname,
                               age : age,
                        }),
        async:false,
    })
    .done(function( json ) {
        // Table refresh
        ajax_students_list();
        alert('Студент создан!!!');
    });
}



// Find Students Table with AJAX
function ajax_find(){

    let find_name = $('#find_name').val();

    // Find HTML from AJAX
    $.ajax({
        method: "GET",
        url: "students_ajax.php",
        data: { action : 'find',
                find_name : find_name
        },
        beforeSend: function (){
            console.log('beforeSend AJAX');
            $('#table').html('Searching ......');
        }
    })
    .done(function( html ) {
        // alert( html );
        $('#table').html(html);
    });
}



// Get Insert Into Students Table with AJAX
function ajax_student_edit(id=0){

    let new_name = $('#new_name_'+id).val();
    let new_surname = $('#new_surname_'+id).val();
    let new_age= $('#new_age_'+id).val();

    // alert(id); // alert(new_name); // return;
    if (new_name==''){
        alert('Please enter new name');
        return;}
    // Insert into table from HTML form  to AJAX
    $.ajax({
        method: "PUT",
        url: "/api/student_update/"+id,
        contentType: "application/json; charset=UTF-8",
        dataType: "json",
        data: JSON.stringify({ name : new_name,
                               surname : new_surname,
                               age : new_age,
                        }),
        async:false,
    })
    .done(function( json ) {
        // Table refresh
        ajax_students_list();
    });
}


// Delete from Students Table with REST API
function ajax_student_delete(id=0){

    // alert(id);

    if (confirm("Do you want to delete this Student !") == false) {
        return;
    }

    // Delete into table from HTML form  to AJAX
    $.ajax({
        method: "DELETE",
        url: "api/student_delete/"+id,
        contentType: "application/json; charset=UTF-8",
        dataType: "json",
        data: {  },
    })
    .done(function( html ) {
        // Table refresh
        ajax_students_list();
    });
}

</script>

<!-- Форма поиска имени студентов -->
<h3> Student Search Form  </h3>
<form action="" method="post">
    Name: <input type="text" name="find_name">
    <input type="submit" value="Send">
    <input type="hidden" name="action" value="find">
</form>


<h3>Таблица студентов (Blade):</h3>
<table id="table" class="table table-bordered table-sm table-hover">

</table>





<!-- Добавления новый студентов -->
<h3 class="mt-5" > New Student Form  </h3>
{{-- <form action="" method="post"> --}}
    Name: <input class="mb-2" type="text" name="name" id="name">
    <br>
    Surname: <input class="mb-2" type="text" name="surname" id="surname">
    <br>
    Age: <input class="mb-2" type="text" name="age" id="age">
    <br>
    <input class="btn btn-primary mt-2" type="button" value="Send AJAX REST API" onclick="ajax_student_create()">
    <input type="hidden" name="action" value="insert">
{{-- </form> --}}




@endsection
