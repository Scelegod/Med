<?php
 if (!empty($_SESSION['auth']) and empty($_POST['exit'])) {
    echo '<img src="../Img/user.png" alt="user" class="main__info__user__img" >';
    echo '<div class="main__info__user">';
    echo '<div class="main__info__user__name">' . $_SESSION['user']['fio'] . '</div>';
    echo '<div class="main__info__user__snils">  СНИЛС: ' . $_SESSION['user']['snils'] . '</div>';
    echo '</div>';
}else if(!empty($_SESSION['authDoc']) and empty($_POST['exit'])){
    echo '<img src="../Img/user.png" alt="user" class="main__info__user__img" >';
    echo '<div class="main__info__user">';
    echo '<div class="main__info__user__name">' . $_SESSION['user']['fio'] . '</div>';
    echo '<div class="main__info__user__snils"> Специальность: '  . $_SESSION['user']['post'] . '</div>';
    echo '</div>';
}else{
    echo '<div class="main__info__user__btn">' . 'Войти' . '</div>';
}