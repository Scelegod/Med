<!-- //<?php ?>
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "test";
//
//
//$postVal = trim($_POST['postVal']);
//
//$link = mysqli_connect($servername, $username, $password, $dbname);
//
//// Check connection
//if (!$link) {
//    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
//    exit;
//} 
//
//
//$sql = "SELECT * FROM Post";
//if($result = $link->query($sql)){
//    foreach($result as $row){
//        echo '<div class="content__post__box">';
//        echo          '<div class="box__title">' . $row["PostValue"] . '</div>';
//        echo          '<img class="box__img" src="./../Img/arrow.png" alt="link">';
//        echo      '</div>';
//    }
//    echo "</table>";
//    $result->free();
//} else{
//    echo "Ошибка: " . $link->error;
//}
//$link->close(); 
// $sql = mysqli_query($link, "SELECT 'PostId','PostValue' FROM 'Post'");
//   while ($result = mysqli_fetch_array($sql)) {
//     echo "{$result['PostValue']}";
//   }
