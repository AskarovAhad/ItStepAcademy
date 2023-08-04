<?php

// Адрес сайта 
$url_name = "https://www.timeapi.io/api/Time/current/zone?timeZone=Asia/Tashkent";
// $url_name = "https://www.msn.ru";

// подготовка 
$ch_session = curl_init();
// Настройки
// Установка CURLOPT_RETURNTRANSFER (вернуть ответ в виде строки)
curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
// Установка URL
curl_setopt($ch_session, CURLOPT_URL, $url_name);
 // Выполнение запроса cURL
$result_json = curl_exec($ch_session);
// закрытие сеанса curl для освобождения системных ресурсов
curl_close($ch_session);    

$json_array = json_decode($result_json, true );

// print_r($json_array);

echo $json_array['timeZone'].'-'.$json_array['date'].'-'.$json_array['time'];

 
?>