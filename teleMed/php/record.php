<?php
session_start();
require './connect.php';
require './auth.php';
// $_SESSION['auth'];
$fioUsers = $_SESSION['user']['fio'];
$idDoc = $_POST['idDoc'];
$idUsers = $_SESSION['user']['id'];
$date = $_POST['date'];
$time = $_POST['time'];
$problems = $_POST['problems'];
$contact = $_POST['contact'];
// echo $_SESSION['auth'];
// echo $fioUsers . ' . '. $idUsers;
echo $fioUsers . ' <br>'. $idDoc . ' <br>'. $idUsers .'<br> ' . $date . '<br> ' . $time .'<br> '. $problems .'<br> ' . $contact;
if(!empty($problems)){
    $query2 = "INSERT INTO `record` (`PersonalCode`, `UserCode`, `Data`, `Time`, `Problems`, `Contact`) VALUES ('$idDoc', '$idUsers', '$date', '$time', '$problems', '$contact')";
    mysqli_query($link, $query2);
    
    header("Location: http://med/teleMed/teleMed.php");
}
