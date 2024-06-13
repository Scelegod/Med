<?php
require './connect.php';
echo $_POST['probCodeRec'].'<br>';
echo $_POST['dataCodeRec'].'<br>';
echo $_POST['timeCodeRec'].'<br>';
echo $_POST['persCodeRec'].'<br>';
echo $_POST['recId'].'<br>';
echo $_POST['usCodeRec'];
$recId = $_POST['recId'];
$probCodeRec = $_POST['probCodeRec'];
$sql4 = "UPDATE `record` SET `Problems` = '$probCodeRec' WHERE `record`.`RecordId` = '$recId'";
mysqli_query($link, $sql4);
header("Location: http://med/teleMed/teleMed.php");
?>