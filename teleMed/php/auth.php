<?php
if (!empty($_POST['password']) and !empty($_POST['tel2'])) {
    $tel2 = $_POST['tel2'];
    $password = $_POST['password'];
    if(!empty($_POST)){
        if ($_POST['flag'] === '1') {
            $check_user2 = mysqli_query($link, "SELECT * FROM `users` WHERE `tel`='$tel2' AND `password`='$password'");
            if(mysqli_num_rows($check_user2)> 0){ //Пациент
                $user = mysqli_fetch_assoc($check_user2);
                $_SESSION['auth'] = true;
                $_SESSION['user'] = [
                    "id" => $user['UsersId'],
                    "fio" => $user['fio'],
                    "tel" => $user['tel'],
                    "snils" => $user['snils'],
                    "email" => $user['email'],
                ];
            } 
        } else {
            $check_user2 = mysqli_query($link, 
            "SELECT Personal.PersonalId, Personal.Fio, Personal.phone, Personal.PostTime, Post.PostValue, med.MedId, med.MedName 
            FROM (((`Personal` INNER JOIN MedPost ON Personal.MedPostCode = MedPost.MedPostId) 
            INNER JOIN Post ON MedPost.PostCode = Post.PostId)
            INNER JOIN Med ON MedPost.MedCode = Med.MedId) WHERE `phone`='$tel2' AND `password`='$password'");
            if(mysqli_num_rows($check_user2)> 0){ // Врач
                $user = mysqli_fetch_assoc($check_user2);
                $_SESSION['authDoc'] = true;
                $_SESSION['user'] = [
                    "id" => $user['PersonalId'],
                    "fio" => $user['Fio'],
                    "tel" => $user['phone'],
                    "post" => $user['PostValue'],
                    "medId" => $user['MedId'],
                    "medName" => $user['MedName'],
                    // "email" => $user['email'],
                ];
            } 
        }
    }
}