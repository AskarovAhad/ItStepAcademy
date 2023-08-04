<?php
/*
Plugin Name: Word Filter for bad words
Plugin URL: http://itstep.org
Description: Фильтр плохих слов
Version: 1.0
Author: Ahad
Author URI: somelink
*/

add_filter('the_content','word_fitter');

function word_fitter($content){
    $bads = ['дурак', 'fool'];
    $goods = ['д***к','f**l'];
    $content = str_ireplace($bads, $goods, $content);
    return $content;
}


?>