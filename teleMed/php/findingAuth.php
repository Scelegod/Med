<?php
session_start();
    // require './connect.php';
if (isset($_SESSION['auth'])) {

     $query5 = "SELECT * FROM `chat` WHERE `FromWho`='$idUs' AND `ToWho`='$doc' ORDER BY `chat`.`Data`, `chat`.`Time` ASC";
     $query8 = "SELECT * FROM `record` WHERE `PersonalCode`='$doc' AND `UserCode`='$idUs' AND `Data`='30.5.2024'";
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
     $query7 = "SELECT * FROM `chat` WHERE `FromWho`='$doc' AND `ToWho`='$idUs' ORDER BY `chat`.`Data`, `chat`.`Time` ASC";
     if($result = $link->query($query7)){
         foreach($result as $row){
             echo '<p class="message message__time" data-times="'.$row['Time'].' '.$row['Data'].'">';
             echo '<span class="text">'.$row["Sms"].'</span>';
             echo '<span class="figure"></span>';
             echo '</p>';
         }
     }
}else if(isset($_SESSION['authDoc'])){
    $query5 = "SELECT * FROM `chat` WHERE `FromWho`='$idDoc' AND `ToWho`='$Us'";
    $query7 = "SELECT * FROM `chat` WHERE `FromWho`='$Us' AND `ToWho`='$idDoc'";
    $query8 = "SELECT * FROM `record` WHERE `PersonalCode`='$idDoc' AND `UserCode`='$Us'";
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