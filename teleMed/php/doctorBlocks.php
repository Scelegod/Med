<?php
$sql = "select Personal.PersonalId, Personal.Fio, Personal.PostTime, Med.MedName, Post.PostValue, Post.PostId, Med.MedId, City.CityId ,City.CityValue, Adress.AdressId , Adress.AdressValue
from (((((Personal
inner join MedPost on Personal.MedPostCode = MedPost.MedPostId)
inner join Med on MedPost.MedCode = Med.MedId)
inner join Post on MedPost.PostCode = Post.PostId)
inner join City on Med.CityCode = City.CityId)
inner join Adress on Med.AdressCode = Adress.AdressId);";
if($result = $link->query($sql)){
    foreach($result as $row){
        //echo          '<div class="doctors__block">' . $row["Fio"] . $row["PostTime"] . $row["MedName"] . $row["PostValue"] . $row["CityId"] . '</div>';
        echo          '<div data-persid="' . $row["PersonalId"] . '" class="doctors__block">';
        echo          '<div class="block__info">';
        echo          '<img src="./img/cabinet.png" alt="photo" class="doctors__block__img">';
        echo          '<div class="doctors__block__info">';
        echo          '<div class="doctors__name">' . $row["Fio"] . '</div>';
        echo          '<div data-postdocid="' . $row["PostId"] . '" class="doctors__post">' . $row["PostValue"] . '</div>';
        echo          '<div data-medpersid="'. $row["MedId"] . '" class="doctors__med">' . $row["MedName"] . '</div>';
        echo          '<div data-medcitypersid="'. $row["CityId"] . '" class="doctors__med__city">' . $row["CityValue"] . '</div>';
        echo          '<div data-medadresspersid="'. $row["AdressId"] . '" class="doctors__med__adress">' . $row["AdressValue"] . '</div>';
        echo          '<div class="doctors__med__posttime">' . $row["PostTime"] . '</div>';
        echo          '</div>';
        echo          '</div>';
        echo          '<div class="doctors__btn">Записаться</div>';
        echo          '</div>';
    }
    $result->free();
} else{
    echo "Ошибка: " . $link->error;
}