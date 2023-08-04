<form action="" method="post">
    <input type="text" name="post_country" id="post_country">
    <input type="submit" value="submit" name="submit">
    <input type="submit" value="select" name="select" >
</form>

<?php
    $post_country = $_POST['post_country'];
    $post_select = $_POST['select'];
    if(!is_file("countries.txt")) file_put_contents('countries.txt', "");

    $read_file_stream = fopen("countries.txt","r");
    $flag = true;

    if(isset($_POST['select'])){
        fseek($read_file_stream,0,SEEK_SET);
        while(!feof($read_file_stream)){
            echo fgets($read_file_stream)."<br>";
        }
    }

    if(isset($_POST['submit'])){
        if($post_country == "") {echo"<br>empty field<br>"; exit;}
    
        fseek($read_file_stream,0,SEEK_SET);
        while(!feof($read_file_stream)){
            if(fgets($read_file_stream) == $post_country){$flag = false; break;}
        }

        if(!$flag) echo "<br>country $post_country already exists<br>";
        else{
            file_put_contents('countries.txt', $post_country."\n", FILE_APPEND);
            echo "<br>succesfully added<br>";
        }
    }

    

    
    
    
    

?>