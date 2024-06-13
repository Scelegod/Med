<?php
$nowData = date('Y').'-'.date('n').'-'.date('j');

if(!empty($_SESSION['auth']) and empty($_POST['exit'])){
    $idUs = $_SESSION['user']['id'];
    $sql = ("select record.Request, record.PersonalCode, record.Data, record.Time, post.PostValue
    from (((record
    INNER join personal on record.PersonalCode = personal.PersonalId)
    INNER join medpost on personal.MedPostCode = medpost.MedPostId)
    INNER join post on medpost.PostCode = post.PostId)
    WHERE `UserCode`='$idUs' and record.Request = 'Открыта' and `Data`>'$nowData' ORDER BY `Data`, `Time` ASC LIMIT 3");
    if($result = $link->query($sql)){
        foreach($result as $row){
            echo '<div class="block__record">';
            echo '<div class="record__post">' . $row["PostValue"] . '</div>';
            echo '<div class="record__data">' . $row["Data"] . '</div>';
            echo '<div class="record__time">' . $row["Time"] . '</div>';
            echo '</div>';
        }
    }
            
}elseif(!empty($_SESSION['authDoc']) and empty($_POST['exit'])){
    $idUsDoc = $_SESSION['user']['id'];
    $sql = ("select record.Request, record.Data, record.Time, users.fio
    from (record 
    inner join users on record.UserCode = users.UsersId)
    WHERE `PersonalCode`='$idUsDoc' and record.Request = 'Открыта' and `Data`>'$nowData' ORDER BY `Data`, `Time` ASC LIMIT 3");
    if($result = $link->query($sql)){
        foreach($result as $row){
            echo '<div class="block__record">';
            echo '<div class="record__post">' . $row["fio"] . '</div>';
            echo '<div class="record__data">' . $row["Data"] . '</div>';
            echo '<div class="record__time">' . $row["Time"] . '</div>';
            echo '</div>';
        }
    }
}