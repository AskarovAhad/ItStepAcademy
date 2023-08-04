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

        function ajax_edit_name(id){
            
        }

    </script>


</head>
<body>
    



<!-- Форма поиска имени студентов -->
<h3> Student Search Form  </h3>
<form action="" method="post">
    Name: <input type="text" name="find_name">
    <input type="button" value="Send">
    <input type="hidden" name="action" value="find">
</form>


<!-- Таблица студентов -->
<h3> Students Table (PDO) </h3>

<!-- Table container -->
<div id='table'> <!-- students table html from AJAX --> </div> 

<br>

<!-- Добавления новый студентов -->
<h3> New Student Form  </h3>
<form action="" method="post">
    Name: <input type="text" name="name">
    <br>
    Surname: <input type="text" name="surname">
    <br>
    Age: <input type="text" name="age">
    <br>
    <input type="submit" value="Send">
    <input type="hidden" name="action" value="insert">
</form>



</body>
</html>


