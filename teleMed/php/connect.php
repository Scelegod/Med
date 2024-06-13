<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TeleMed";
                
$link = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
} 