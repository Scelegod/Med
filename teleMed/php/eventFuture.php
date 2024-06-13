<?php
$nowData = date('Y').'-'.date('n').'-'.date('j');
if (isset($_SESSION['auth'])) {
    $idUs = $_SESSION['user']['id'];
    $sql = "select record.recordId,record.Request, record.PersonalCode, personal.Fio, post.PostValue, record.Data, record.Time, record.Contact
    from (((record 
    inner join personal on personal.PersonalId = record.PersonalCode)
    inner join medpost on medpost.MedPostId = Personal.MedPostCode)
    inner join post on post.PostId = medpost.PostCode)
    WHERE `UserCode`='$idUs' and record.Request = 'Открыта' and `Data`>'$nowData' ORDER BY `Data`, `Time` ASC ";
    if($result = $link->query($sql)){
        foreach($result as $row){
            echo '<div class="block__record__content__future">';
            echo '<div class="dispnone evCont__record__post__recId">' . $row["recordId"] . '</div>';
            echo '<div class="evCont__record__post">' . $row["Fio"] . '</div>';
            echo '<div class="evCont__record__post">' . $row["PostValue"] . '</div>';
            
            echo '<div class="record__fulldata">';
            echo '<div class="evCont__record__data">' . $row["Data"] . '</div>';
            echo '<div class="evCont__record__time">' . $row["Time"] . '</div>';
            echo '</div>';
            echo '<div class="record__contact">' . $row["Contact"] . '</div>';
            echo '<button class="record__contact record__contact__btn">Отменить</button>';
            echo '</div>';
        }
    }
}else if(isset($_SESSION['authDoc'])){
    $idUsDoc = $_SESSION['user']['id'];
    // echo $nowData;
    $sql = ("select record.Request, record.Data, record.Time, users.fio, record.Contact
    from (record 
    inner join users on record.UserCode = users.UsersId)
    WHERE `PersonalCode`='$idUsDoc' and record.Request = 'Открыта' and `Data`>'$nowData' ORDER BY `Data`, `Time` ASC");
    if($result = $link->query($sql)){
        foreach($result as $row){
            echo '<div class="block__record__content__future">';
            echo '<div class="evCont__record__post">' . $row["fio"] . '</div>';
            
            echo '<div class="record__fulldata">';
            echo '<div class="evCont__record__data">' . $row["Data"] . '</div>';
            echo '<div class="evCont__record__time">' . $row["Time"] . '</div>';
            echo '</div>';
            echo '<div class="record__contact">' . $row["Contact"] . '</div>';
            echo '</div>';
        }
    }
}