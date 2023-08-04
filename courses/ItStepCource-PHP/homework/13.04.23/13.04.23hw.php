<h3> New Login Form  </h3>
<form action="" method="post">
    Login: <input type="text" id="login" name="login">
    <br>
    Pass: <input type="text" id="password" name = "password">
    <br>
    <input type="submit" value="send">
</form>

<?php
    include("13.04.23hw_connection.php");
    
    $post_login = $_POST['login'];
    $post_password = $_POST['password'];

    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $db_name = 'user_database';

    $sql = "SELECT COUNT(*) as count FROM user_table WHERE login = '$post_login';";

    $pdo = connect($host,$username,$pass,$db_name);

    if($res['count'] == 0) {$sql="INSERT INTO user_table (login, pass) VALUES($post_login, $post_password);"; echo("<br>added<br>");}
    else echo ("<br>this user aldeady exists<br>"); 

    $pdo->query($sql);
?>