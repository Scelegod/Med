<?php
require './connect.php';
if(!empty($_POST['sms']) and isset($_POST['tosms'])){
    $idUs2 = $_POST['idUs']; 
    $doc2 = $_POST['doc']; 
    $today2 = $_POST['today']; 
    $nowTime2 = $_POST['nowTime']; 
    $btn = $_POST['tosms'];
    $sms = $_POST['sms'];
    echo $idUs2.'.'.$doc2.'.'.$sms.'.'.$today2.'.'.$nowTime2;

    echo $sms;
    if(isset($btn) and isset($_POST['sms'])){
        $query6 = "INSERT INTO `chat` (`ChatId`,`FromWho`,`ToWho`,`Sms`,`Data`,`Time`) VALUES (NULL, '$idUs2', '$doc2', '$sms', '$today2', '$nowTime2')";
        mysqli_query($link, $query6);
        $sms = null;
    }
    // unset($_POST['tosms']);
    $btn = 'null';
    header("Location: http://med/teleMed/teleMed.php");
    // exit;
}else{
    header("Location: http://med/teleMed/teleMed.php");
}
?>