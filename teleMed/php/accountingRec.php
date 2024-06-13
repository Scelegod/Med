<?php
 if(isset($_SESSION['authDoc']) and $_SESSION['user']['post'] == 'Терапевт'){
    $medDoc = $_SESSION['user']['medName'];
    echo '<div class="record__body body__tabs">';
        echo '<div class="record__body__block">';
        // echo $medDoc;
        echo '<form method="POST" action="./php/editRec.php">';
        echo '<input class="dispnone probCodeRec" name="probCodeRec">';
        echo '<input class="dispnone dataCodeRec" name="dataCodeRec">';
        echo '<input class="dispnone timeCodeRec" name="timeCodeRec">';
        echo '<input class="dispnone persCodeRec" name="persCodeRec">';
        echo '<input class="dispnone usCodeRec" name="usCodeRec">';
        echo '<input class="dispnone recId" name="recId">';
        echo '</form>';
        echo '<table>';
        echo '<tr class="primal__tr">';
        echo '<td>Пациент</td>';
        echo '<td>Снилс</td>';
        echo '<td>Номер телефона</td>';
        echo '<td>Дата приема</td>';
        echo '<td>Время приема</td>';
        echo '<td>Жалобы</td>';
        echo '<td>Врач</td>';
        echo '<td>Специальность</td>';
        echo '<td>Клиника</td>';
        echo '<td>Запись</td>';
        echo '</tr>';
        $sql2 = "select record.Request, record.RecordId, record.Problems, record.PersonalCode, record.Data, record.UserCode,  record.Time, personal.Fio, med.MedName, users.fio, users.snils, users.tel, post.PostValue
        FROM (((((record
        inner join personal on record.PersonalCode = personal.PersonalId)
        INNER join medpost on personal.MedPostCode = medpost.MedPostId)
        INNER join med on med.MedId = medpost.MedCode)
        INNER join users on users.UsersId = record.UserCode)
        INNER join post on medpost.PostCode = post.PostId)
        where med.MedName = '$medDoc' order by record.Data, record.Time ASC";
        if($result = $link->query($sql2)){
            foreach($result as $row){
                echo '<tr>';
                echo '<td class="td__fio">'.$row['fio'] .'</td>';
                echo '<td class="">'.$row['snils'] .'</td>';
                echo '<td class="">'.$row['tel'] .'</td>';
                echo '<td class="">'.$row['Data'].'</td>';
                echo '<td class="">'.$row['Time'].'</td>';
                echo '<td class="td__problems">'.$row['Problems'].'</td>';
                echo '<td class="dispnone">'.$row['PersonalCode'].'</td>';
                echo '<td class="dispnone">'.$row['UserCode'].'</td>';
                echo '<td class="dispnone">'.$row['RecordId'] .'</td>';
                echo '<td class="">'.$row['Fio'].'</td>';
                echo '<td class="">'.$row['PostValue'].'</td>';
                echo '<td class="">'.$row['MedName'].'</td>';
                echo '<td class=""><form method="POST" action="./php/editRecCl.php"><input class="dispnone recIdCl" value="'.$row['RecordId'].'" name="recIdCl"><button class="btn__request">'.$row['Request'].'</button></form></td>';
                
                echo '</tr>';
                // echo $row[''];
            }
        }
        echo '</table>';
        echo '</div>';
    echo '</div>';
}elseif(isset($_SESSION['authDoc']) and $_SESSION['user']['post'] != 'Терапевт'){
    $idDoc = $_SESSION['user']['id'];
    echo '<div class="record__body body__tabs">';
        echo '<div class="record__body__block">';
        echo '<form method="POST" action="./php/editRec.php">';
        echo '<input class="dispnone probCodeRec" name="probCodeRec">';
        echo '<input class="dispnone dataCodeRec" name="dataCodeRec">';
        echo '<input class="dispnone timeCodeRec" name="timeCodeRec">';
        echo '<input class="dispnone persCodeRec" name="persCodeRec">';
        echo '<input class="dispnone usCodeRec" name="usCodeRec">';
        echo '<input class="dispnone recId" name="recId">';
        echo '</form>';
        echo '<table>';
        echo '<tr class="primal__tr">';
        echo '<td>Пациент</td>';
        echo '<td>Снилс</td>';
        echo '<td>Номер телефона</td>';
        echo '<td>Дата приема</td>';
        echo '<td>Время приема</td>';
        echo '<td>Жалобы</td>';
        echo '<td>Врач</td>';
        echo '<td>Специальность</td>';
        echo '<td>Клиника</td>';
        echo '<td>Запись</td>';
        echo '</tr>';
        $sql2 = "select record.Request, record.RecordId, record.Problems, record.PersonalCode, record.Data, record.UserCode,  record.Time, personal.Fio, med.MedName, users.fio, users.snils, users.tel, post.PostValue
        FROM (((((record
        inner join personal on record.PersonalCode = personal.PersonalId)
        INNER join medpost on personal.MedPostCode = medpost.MedPostId)
        INNER join med on med.MedId = medpost.MedCode)
        INNER join users on users.UsersId = record.UserCode)
        INNER join post on medpost.PostCode = post.PostId)
        where record.PersonalCode = '$idDoc' order by record.Data, record.Time ASC";
        if($result = $link->query($sql2)){
            foreach($result as $row){
                echo '<tr>';
                echo '<td class="td__fio">'.$row['fio'] .'</td>';
                echo '<td class="">'.$row['snils'] .'</td>';
                echo '<td class="">'.$row['tel'] .'</td>';
                echo '<td class="">'.$row['Data'].'</td>';
                echo '<td class="">'.$row['Time'].'</td>';
                echo '<td class="td__problems">'.$row['Problems'].'</td>';
                echo '<td class="dispnone">'.$row['PersonalCode'].'</td>';
                echo '<td class="dispnone">'.$row['UserCode'].'</td>';
                echo '<td class="dispnone">'.$row['RecordId'] .'</td>';
                echo '<td class="">'.$row['Fio'].'</td>';
                echo '<td class="">'.$row['PostValue'].'</td>';
                echo '<td class="">'.$row['MedName'].'</td>';
                echo '<td class="">'.$row['Request'].'</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
        echo '</div>';
    echo '</div>';
}