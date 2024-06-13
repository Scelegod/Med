<?php
$sql = "SELECT * FROM Post";
if($result = $link->query($sql)){
    foreach($result as $row){
        echo          '<option data-postselectid="' . $row["PostId"] . '" class="post__option">' . $row["PostValue"] . '</option>';
    }
    $result->free();
} else{
    echo "Ошибка: " . $link->error;
}