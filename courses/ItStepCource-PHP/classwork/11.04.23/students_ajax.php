<?php 

$servername = 'localhost';
$username = 'root';
$pass = '';
$db_name = 'itstep';

$id = $_GET['id'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$age = $_GET['age'];
$action = $_GET['action'];
$find_name = $_GET['find_name'];

$new_name = $_GET['new_name'];



// Создание поключения PDO 
$pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
// установка режима ошибки PDO на исключение
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



// --- Добавления новый студентов ---
if ($action == 'insert') {
    $sql = "INSERT INTO students_table (name, surname, age) 
            VALUES('$name', '$surname', '$age')";
    $result = $pdo->query($sql);
}

// ----  Редактирования имени студента ----
if ($action == 'edit_name') {
    $sql = "UPDATE students_table SET name = '$new_name' WHERE id = $id";
    $result = $pdo->query($sql);
}

// ----  Удаления строки студента ----
if ($action == 'delete') {
    $sql = "DELETE FROM students_table WHERE id = $id";
    $result = $pdo->query($sql);
}



// Запрос списка  студентов 
if ($action == 'show'){
    sleep(1); // Pause 1 seconds 

    $sql = "SELECT * FROM students_table";
    $result = $pdo->query($sql);
}


// Поиск по списку  студентов 
if ($action == 'find'){
    sleep(1); // Pause 1 seconds 

    $sql = "SELECT * FROM students_table 
            WHERE name like '%$find_name%'
            OR surname like '%$find_name%'
            OR age like '%$find_name%' ";

    $result = $pdo->query($sql);
}

// Загрузка таблицы  студентов из SQL
if ($action == 'show' or $action == 'find'):

    // Выполнения запроса 
    $result = $pdo->query($sql);
    // Получения массива строк из PDO
    $students_array = $result->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($students_array);

?>
<!-- Таблица студентов -->
<table border=1>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Surname</th> 
        <th>Age</th>
        <th>Delete</th>
    </tr>
        <?php
            foreach ($students_array as $student):
        ?>
            <tr>
                <td>
                    <?php echo $student['id']; ?>
                </td>
                <td style="width: auto;">
                    <?php echo $student['name']; ?>
                    <!-- Редактирования имени студента -->
                    <form action="" method="post" style="display: inline-block; ">
                        <input type="text" id="new_name_<?php echo $student['id'];?>" size="10">
                        <input type="button" value="Edit" onclick="ajax_edit_name(<?php echo $student['id']; ?>)">
                        <input type="button" value="delete" onclick="ajax_delete_student(<?php echo $student['id']; ?>)">
                    </form>
                </td>
                
                <td><?php echo $student['surname']; ?></td>
                <td><?php echo $student['age']; ?></td>

                <!-- Кнопка удаления  -->
                <td style="width: 40px">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                        <input type="hidden" name = "delete" value="<?php echo $student['id']; ?>">
                        <input type="hidden" name="action" value="delete">
                    </form>
                </td>
            </tr>
        <?php
            endforeach
        ?>
</table>

<?php  
endif 
?>