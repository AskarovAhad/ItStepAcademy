<?php
    
    //1
    $str = "Быстрая коричневая лиса прыгает через ленивую собаку";
    if (preg_match("/лиса/",$str)) echo "1 - contains<br>";
    else echo "1 - don t contains<br>";    

    //2
    $string_where_to_delete_last_word = "Быстрая рыжая лиса";
    $reg_expression = "/\s\w+\s*$/u";
    echo "2 - ". preg_replace($reg_expression, '', $string_where_to_delete_last_word)."<br>";

    //3
    $delete_n_symbol = "Мерцай, мерцай, звездочка,\n Как мне интересно, кто ты. \n Вверху над миром, так высоко, \n Подобно алмазу в небе.";
    echo "3 - ".preg_replace("/\n/", '', $delete_n_symbol)."<br>";
?>