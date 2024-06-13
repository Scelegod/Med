<?php
require './connect.php';
$recIdCl = $_POST['recIdCl'];

echo $_POST['recIdCl'].'<br>';
$sql = "UPDATE `record` SET `Request` = 'Закрыта' WHERE `record`.`RecordId` = '$recIdCl'";
mysqli_query($link, $sql);
header("Location: http://med/teleMed/teleMed.php");
