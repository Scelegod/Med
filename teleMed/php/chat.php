<?php
// session_start();
// require './connect.php';
$nowData = date('Y').'-'.date('m').'-'.date('d');
if (isset($_SESSION['auth'])) {
 $idUs = $_SESSION['user']['id'];
        // echo $idUs;
        // echo $today;
        $nowOclock = date('H');
        $nowMin =  date('i');
        $nowSec = date('s');
        $nowTime = $nowOclock.':'.$nowMin.':'.$nowSec;

        // echo $nowTime;
            $sql = "select record.PersonalCode, personal.Fio, post.PostValue
             from (((record 
             inner join personal on personal.PersonalId = record.PersonalCode)
             inner join medpost on medpost.MedPostId = Personal.MedPostCode)
             inner join post on post.PostId = medpost.PostCode)
             WHERE `UserCode`='$idUs' and `Data`<='$nowData'  ORDER BY `Data`, `Time` ASC";
             $doc;
            if($result = $link->query($sql)){
                foreach($result as $row){
                    echo '<div class="modalChat">';
                   
                        echo '<div class="modalChat__body">';
                    $doc = $row['PersonalCode'];
                            echo '<div data-persid="'.$row['PersonalCode'].'" class="modalChat__title">';
                                echo '<img src="../Img/user.png" alt="doc" class="modalChat__img">';
                                echo '<div class="modalChat__who">';
                                    echo '<div class="modalChat__docName">'.$row['Fio'].'</div>';
                                    echo '<div class="modalChat__docName">'.$row['PostValue'].'</div>';
                                echo'</div>';
                            echo'</div>';
                            echo '<div class="modalChat__note">';
                           require 'php/findingAuth.php';
                            echo '</div>';
                            echo '<iframe name="hidden_frame" id="hidden_frame" style="display: none;"></iframe>';
                            echo '<form method="POST" action="./php/messageTest.php">';
                                echo '<div class="form__group">';
                                    echo ' <textarea name="sms" class="modalChat__input" placeholder="sms"></textarea>';
                                    echo ' <input name="idUs" type="text" class="dispnone idUs__input" value="'.$idUs.'">';
                                    echo ' <input name="doc" type="text" class="dispnone doc__input" value="'.$doc.'">';
                                    echo ' <input name="today" type="text" class="dispnone today__input" value="'.$today.'">';
                                    echo ' <input name="nowTime" type="text" class="dispnone nowTime__input" value="'.$nowTime.'">';
                                    echo ' <button name="tosms" type="button" onclick="send2()" class="modalChat__btn">';
                                        echo '<img src="./img/send.png" style="height: 32px; z-index: 1;" alt="">';
                                    echo '</button>';
                                echo '</div>';
                            echo'</form>';
                        echo '</div>';
                        echo '<img src="./img/close.png" class="close__modalChat">';

                    echo '</div>';
                }

                $result->free();
            }
}else if(isset($_SESSION['authDoc'])){
    $idDoc = $_SESSION['user']['id'];
    $nowOclock = date('H');
    $nowMin =  date('i');
    $nowSec = date('s');
    $nowTime = $nowOclock.':'.$nowMin.':'.$nowSec;
    $sql3 = "select record.UserCode, users.fio, users.snils
    from (record 
    inner join users on users.UsersId = record.UserCode)
    WHERE `PersonalCode`='$idDoc' and `Data`<='$nowData' ORDER BY `Data`, `Time` ASC";
    $doc;
    if($result = $link->query($sql3)){
        foreach($result as $row){
            echo '<div class="modalChat">';
               echo '<div class="modalChat__body">';
               $Us = $row['UserCode'];
               // echo $Us;
                   echo '<div data-persid="'.$row["UserCode"].'" class="modalChat__title">';
                       echo '<img src="../Img/user.png" alt="doc" class="modalChat__img">';
                       echo '<div class="modalChat__who">';
                           echo '<div class="modalChat__UsName">'.$row["fio"].'</div>';
                           echo '<div class="modalChat__docName">'.$row["snils"].'</div>';
                       echo'</div>';
                   echo '</div>';
                   echo '<div id="modalChat__note" class="modalChat__note">';
                   require 'php/findingAuth.php';
                       
                   echo '</div>';
                   
                   echo '<iframe name="hidden_frame" id="hidden_frame" style="display: none;"></iframe>';
                    echo '<form method="POST" action="./php/message2.php" target="hidden_frame">';
                        echo '<div class="form__group">';
                            echo ' <textarea name="sms" class="modalChat__input" placeholder="sms"></textarea>';
                            echo ' <input name="idUs" type="text" class="dispnone idUs__input" value="'.$idDoc.'">';
                            echo ' <input name="doc" type="text" class="dispnone doc__input" value="'.$Us.'">';
                            echo ' <input name="today" type="text" class="dispnone today__input" value="'.$today.'">';
                            echo ' <input name="nowTime" type="text" class="dispnone nowTime__input" value="'.$nowTime.'">';
                            echo ' <button name="tosms" type="button" onclick="send3()" class="modalChat__btn">';
                                echo '<img src="./img/send.png" style="height: 32px; z-index: 1;" alt="">';
                            echo '</button>';
                        echo '</div>';
                    echo'</form>';
                echo '</div>';
                echo '<img src="./img/close.png" class="close__modalChat">';
            echo '</div>';
        }
        // $result->free();
    }
}