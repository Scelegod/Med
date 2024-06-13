<?php
// require './connect.php';
if(!empty($_POST['sms'])){
    $data = [
        'idUs' => $_POST['idUs'],
        'doc' => $_POST['doc'],
        'sms' => $_POST['sms'],
        'today' => $_POST['today'],
        'nowTime' => $_POST['nowTime']
    ]; 
    $conn = new PDO('mysql:host=localhost;dbname=teleMed;', 'root', '');
    $query6 = 'INSERT INTO chat (FromWho, ToWho, Sms, Data, Time) VALUES (:idUs, :doc, :sms, :today, :nowTime)';
    // mysqli_query($link, $query6);
    // mysqli_query($link, $query6);

    $statement = $conn->prepare($query6);
    $result = $statement->execute($data);
    // var_dump($result);
}
