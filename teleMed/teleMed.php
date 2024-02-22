<?php
// include "./php/outputPost.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylecss/main.css">
    <link rel="stylesheet" href="./stylecss/leftbar.css">
    <link rel="stylesheet" href="./stylecss/mainBody.css">
    <link rel="stylesheet" href="./stylecss/rightbar.css">
    <title>ТелеМед</title>
</head>
<body>
    <div class="leftbar">
        <div class="leftbar__title"><div class="header__content__title__color">Теле</div>Медецина</div>
        <div class="leftbar__menu">
            <div class="leftbar__menu__content">
                <img src="./img/pharmacy.png" alt="pharmacy" class="leftbar__menu__content__img">
                <!-- https://www.flaticon.com/free-icon/pharmacy_2695914?term=pharmacy&page=1&position=71&origin=search&related_id=2695914 -->
                <div class="leftbar__menu__content__title">Записаться</div>
            </div>
            <div class="leftbar__menu__content">
                <img src="./img/calendar.png" alt="calendar" class="leftbar__menu__content__img">
                <div class="leftbar__menu__content__title">События</div>
                <!-- https://www.flaticon.com/free-icon/calendar_1581943?term=events&page=1&position=53&origin=search&related_id=1581943 -->
            </div>
            <div class="leftbar__menu__content">
                <img src="./img/option.png" alt="option" class="leftbar__menu__content__img">
                <div class="leftbar__menu__content__title">Мой кабинет</div>
                <!-- https://www.flaticon.com/free-icon/option_4626734 -->
            </div>
        </div>
    </div>
    <div class="main">
        <div class="main__body">
            <div class="main__info">
                <img src="../Img/user.png" alt="user" class="main__info__user__img">
                <div class="main__info__user">
                    <div class="main__info__user__name">lkasdfjgsd alssdf sdfsdf</div>
                    <div class="main__info__user__snils">СНИЛС: 123-223-223 23</div>
                </div>
            </div>
            <div class="body__content__note">Уважаемы пациент, для записи на онлайн-консультацию выберите врача из клиники, к которой вы прикреплены.
                Врачи других клиник не смогут вас проконсультировать
            </div>
            <div class="body__content">
                <div class="body__content__title">Плановая запись</div>
                <div class="content__post">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "test";
                    
                    $link = mysqli_connect($servername, $username, $password, $dbname);
                    
                    // Check connection
                    if (!$link) {
                        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
                        exit;
                    } 
                    
                    
                    $sql = "SELECT * FROM Post";
                    if($result = $link->query($sql)){
                        foreach($result as $row){
                            echo '<div class="content__post__box">';
                            echo          '<div class="post__box__title">' . $row["PostValue"] . '</div>';
                            echo          '<img class="post__box__img" src="./../Img/arrow.png" alt="link">';
                            echo      '</div>';
                        }
                        $result->free();
                    } else{
                        echo "Ошибка: " . $link->error;
                    }
                    $link->close();
                    ?>
                    <!-- <div class="content__post__box">
                        <p class="post__box__title">sdfsdf</p>
                        <img src="./../Img/arrow.png" alt="arrow" class="post__box__img">
                    </div>
                    <div class="content__post__box">
                        <p class="post__box__title"></p>
                        <img src="./../Img/arrow.png" alt="arrow" class="post__box__img">
                    </div> -->
                </div>
            </div>
        </div>
        <div class="rightbar">
        </div>
    </div>
</body>
</html>