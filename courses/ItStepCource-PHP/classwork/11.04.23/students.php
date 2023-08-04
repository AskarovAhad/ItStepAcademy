<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- Connect jQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <!-- AJAX JS  -->
    <script>

    $( document ).ready(function() {
        ajax_table_load()
    });

        

        // Get Students Table with AJAX
        function ajax_table_load(){

            // GET HTML from AJAX 
            $.ajax({
                method: "GET", 
                url: "students_ajax.php",
                data: { action: 'show'},
                beforeSend: function (){
                    console.log('beforeSend AJAX');
                    $('#table').html('Loading ......');
                }
            })

            .done(function( html ) {
                // alert( html );
                $('#table').html(html);
            });
        }


        // Get Insert Into Students Table with AJAX
        function ajax_insert(){

            let name = $('#name').val();
            let surname = $('#surname').val();
            let age = $('#age').val();

            // alert(name);
            // return;

            // Insert into table from HTML form  to AJAX 
            $.ajax({
                method: "GET", 
                url: "students_ajax.php",
                data: { action  : 'insert', 
                        name    : name,
                        surname : surname,
                        age     : age,
                },

            })
            .done(function( html ) {
                
                // Table refresh
                ajax_table_load();
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
        function ajax_edit_name(id=0){

            
            let new_name = $('#new_name_'+id).val();
            // alert(id);
            // alert(new_name);
            // return;
            
            if (new_name==''){
                alert('Please enter new name');
                return;
            } 

            // Insert into table from HTML form  to AJAX 
            $.ajax({
                method: "GET", 
                url: "students_ajax.php",
                data: { action  : 'edit_name', 
                        id    : id,
                        new_name : new_name
                },

            })
            .done(function( html ) {
                // Table refresh
                ajax_table_load();
            });
        }

        function ajax_delete_student(id=0){
        // dELETE ftom table from HTML form  to AJAX 
        $.ajax({
            method: "GET", 
            url: "students_ajax.php",
            data: { action  : 'delete', 
                    id    : id,
            },

        })
        .done(function( html ) {
            // Table refresh
            ajax_table_load();
        });
        }

    </script>


</head>
<body>
    



<!-- Форма поиска имени студентов -->
<h3> Student Search Form  </h3>
<form action="" method="post">
    Name: <input type="text" id="find_name">
    <input type="button" value="Find AJAX" onclick='ajax_find()'>
    <!-- <input type="hidden" name="action" value="find"> -->
</form>


<!-- Таблица студентов -->
<h3> Students Table (AJAX) </h3>

<!-- Table container -->
<div id='table'> <!-- students table html from AJAX --> </div> 

<br>

<!-- Добавления новый студентов -->
<h3> New Student Form  </h3>
<form action="" method="post">
    Name: <input type="text" id="name">
    <br>
    Surname: <input type="text" id="surname">
    <br>
    Age: <input type="text" id="age">
    <br>
    <input type="button" value="Send AJAX" onclick="ajax_insert()" >
</form>



</body>
</html>


