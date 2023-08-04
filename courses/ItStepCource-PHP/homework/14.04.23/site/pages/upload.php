<html>
    <br>
    <a href="../index.php">go_back_to_index.php :)</a>
    <br>
</html>

<?php
    $file_name = $_FILES["fileToUpload"]["name"];
    $file_size = $_FILES["fileToUpload"]["size"];
    $file_path = $_FILES["fileToUpload"]["tmp_name"];
    $images_dir = "../images/";
    $where_to_upload = $images_dir.$file_name;
    
    if (file_exists($where_to_upload)) {echo "sry file already exists"; exit;}
    
    move_uploaded_file($file_path, $where_to_upload); 
    
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'super_data_base';
    
    $pdo1 = new PDO("mysql:host=localhost;dbname=super_data_base", $username, $password);
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO pictures (name, size, imagepath) VALUES('$file_name', $file_size, '$file_path');";
    $pdo1->query($sql);

    echo "file ".$file_name." uploaded.";
?>


