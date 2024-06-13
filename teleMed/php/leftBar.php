<?php
if(isset($_SESSION['authDoc']) and $_SESSION['user']['post'] == 'Терапевт'){
    echo '<div class="leftbar__menu__content tabik">';
    echo '<img src="./img/record.png" alt="option" class="leftbar__menu__content__img">';
    echo '<div class="leftbar__menu__content__title">Учёт</div>';
    echo '</div>';
}elseif(isset($_SESSION['authDoc']) and $_SESSION['user']['post'] != 'Терапевт'){
    echo '<div class="leftbar__menu__content tabik">';
    echo '<img src="./img/record.png" alt="option" class="leftbar__menu__content__img">';
    echo '<div class="leftbar__menu__content__title">Учёт</div>';
    echo '</div>';
}