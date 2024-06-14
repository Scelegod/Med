<?php
session_start();
require './connect.php';
if (!empty($_POST['fio']) and !empty($_POST['pass']) and !empty($_POST['tel']) and !empty($_POST['snils'])and !empty($_POST['email'])) {
    $fioreg = $_POST['fio'];
    $passreg = $_POST['pass'];
    $telreg = $_POST['tel'];
    $snilsreg = $_POST['snils'];
    $emailreg = $_POST['email'];
    
    $query2 = "INSERT INTO `users` (`UsersId`, `password`, `tel`, `fio`, `snils`,`email`) VALUES (NULL, '$passreg', '$telreg', '$fioreg', '$snilsreg', '$emailreg')";
    $query3 = "SELECT * FROM `users` WHERE `tel`='$telreg' AND `fio`='$fioreg'";
    mysqli_query($link, $query2);
    if($result = $link->query($query3)){
        foreach($result as $row){
            echo $row['UsersId'];
            $query4 = "INSERT INTO `allUsers` (`allUsersId`, `PerCode`, `UsCode`) VALUES (NULL, NULL, " .$row['UsersId']. ")";
            mysqli_query($link, $query4);
        }
    }
    $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `tel`='$telreg' AND `password`='$passreg'");
    if(mysqli_num_rows($check_user)> 0){
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['auth'] = true;
        $_SESSION['user'] = [
            "id" => $user['UsersId'],
            "fio" => $user['fio'],
            "tel" => $user['tel'],
            "snils" => $user['snils'],
            "email" => $user['email'],
        ];
    } 
    header("Location: http://med/teleMed/teleMed.php");
}else {
}