<?php

// if(isset($_POST['cancelRecInp'])){
    // echo $_POST['cancelRecInp'];
// }
require './connect.php';

if(!empty($_POST)){
    if($_POST['cancelRec'] === '1'){
        if(isset($_POST['cancelRecInp'])){
            $cancelRecInp = $_POST['cancelRecInp'];
            echo $cancelRecInp;
            $sql6 = "DELETE FROM `record` WHERE `record`.`RecordId`='$cancelRecInp'";
            mysqli_query($link, $sql6);

            header("Location: http://med/teleMed/teleMed.php");
            
        }else{
            echo 'Pyst';
            header("Location: http://med/teleMed/teleMed.php");

        }
    }
}