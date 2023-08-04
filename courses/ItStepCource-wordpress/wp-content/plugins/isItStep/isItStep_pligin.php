<?php
/*
Plugin Name: ItStep plugin
Plugin URL: http://itstep.org
Description: Фильтр ItStep
Version: 1.0
Author: Ahad
Author URI: somelink
*/

add_filter('the_content','isItStep');

function isItStep($content){
    $word = ['itstep'];
    $change = ['Компьютерная Академия IT STEP | Ташкент  https://tashkent.itstep.org'];
    $content = str_ireplace($word, $change, $content);
    return $content;
}


?>