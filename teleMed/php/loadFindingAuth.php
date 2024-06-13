<?php
session_start();
require './connect.php';
if (isset($_SESSION['auth'])) {
        $data = [
           'idUs' => $_POST['idUs'],
           'doc' => $_POST['doc'],
           // "sms" => $_POST['sms'],
           // "today" => $_POST['today'],
           // "nowTime" => $_POST['nowTime'],
       ]; 
       $idUs2 = $data['idUs'];
       $doc2 = $data['doc'];
    $query5 = "SELECT * FROM `chat` WHERE `FromWho`='$idUs2' AND `ToWho`='$doc2' ORDER BY `chat`.`Data`, `chat`.`Time` ASC";
    $query8 = "SELECT * FROM `record` WHERE `PersonalCode`='$doc2' AND `UserCode`='$idUs2' AND `Data`='30.5.2024'";
    if($result = $link->query($query5) and $result3 = $link->query($query8)){
        foreach($result3 as $row){
            echo '<p class="message2 message__time" data-times="'.$row['Time'].' '.$row['Data'].'">';
            echo '<span class="text">'.$row['Problems'].'</span>';
            echo '<span class="figure"></span>';
            echo '</p>';
        }
        foreach($result as $row){
            echo '<p class="message2 message__time" data-times="'.$row['Time'].' '.$row['Data'].'">';
            echo '<span class="figure"></span>';
            echo '<span class="text">'.$row["Sms"].'</span>';
            echo '</p>';
        }
    }
    $query7 = "SELECT * FROM `chat` WHERE `FromWho`='$doc2' AND `ToWho`='$idUs2' ORDER BY `chat`.`Data`, `chat`.`Time` ASC";
    if($result = $link->query($query7)){
        foreach($result as $row){
            echo '<p class="message message__time" data-times="'.$row['Time'].' '.$row['Data'].'">';
            echo '<span class="text">'.$row["Sms"].'</span>';
            echo '<span class="figure"></span>';
            echo '</p>';
        }
    }
}else if(isset($_SESSION['authDoc'])){
    $data = [
        'idUs' => $_POST['idUs'],
        'doc' => $_POST['doc'],
    ]; 
    $idUs2 = $data['idUs'];
    $doc2 = $data['doc'];
    $query5 = "SELECT * FROM `chat` WHERE `FromWho`='$idUs2' AND `ToWho`='$doc2'";
    $query7 = "SELECT * FROM `chat` WHERE `FromWho`='$doc2' AND `ToWho`='$idUs2'";
    $query8 = "SELECT * FROM `record` WHERE `PersonalCode`='$idUs2' AND `UserCode`='$doc2'";
    if($result = $link->query($query5) and $result2 = $link->query($query7) and $result3 = $link->query($query8)){
       foreach($result3 as $row){
           echo '<p class="message message__time" data-times="'.$row['Time'].' '.$row['Data'].'">';
           echo '<span class="text">'.$row["Problems"].'</span>';
           echo '<span class="figure"></span>';
           echo '</p>';
       }
       foreach($result2 as $row){
           echo '<p class="message message__time" data-times="'.$row['Time'].' '.$row['Data'].'">';
           echo '<span class="text">'.$row["Sms"].'</span>';
           echo '<span class="figure"></span>';
           echo '</p>';
       }
       foreach($result as $row){ //Персонал
           echo '<p class="message2 message__time" data-times="'.$row['Time'].' '.$row['Data'].'">';
           echo '<span class="figure"></span>';
           echo '<span class="text">'.$row["Sms"].'</span>';
           echo '</p>';
       }
    }
}