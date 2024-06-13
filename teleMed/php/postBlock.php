<?php
    
    $sql = "SELECT * FROM Post";
    if($result = $link->query($sql)){
        foreach($result as $row){
            echo '<div class="content__post__box">';
            echo          '<div data-postid="' . $row["PostId"] . '" class="post__box__title">' . $row["PostValue"] . '</div>';
            echo          '<img class="post__box__img" src="./../Img/arrow.png" alt="link">';
            echo      '</div>';
        }
        $result->free();
    } else{
        echo "Ошибка: " . $link->error;
    }
    $link->close();