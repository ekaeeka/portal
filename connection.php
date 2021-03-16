<?php

$serverName = 'localhost';
$userName = 'root';
$password = 'root';
$nameDB='portal';


$connection = new mysqli($serverName, $userName, $password,$nameDB);

if ($connection->connect_error) {
    die('Ошибка при подключении БД: '. $connection->connect_error);
}


