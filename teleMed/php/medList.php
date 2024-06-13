<?php
$sql = "SELECT * FROM med";
if($result = $link->query($sql)){
    foreach($result as $row){
        echo          '<option class="med__option" data-medid="'. $row["MedId"] . '">' . $row["MedName"] . '</option>';
    }
    $result->free();
} else{
    echo "Ошибка: " . $link->error;
}