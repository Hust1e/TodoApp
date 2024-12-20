<?php
$data = array(
    "name" => "Ivan",
    "age" => 30,
    "city" => "Moscow"
);

// Кодировка массива в JSON
$json_data = json_encode($data);

// Отправка JSON-данных клиенту
header("Content-Type: application/json");
echo $json_data;
exit();