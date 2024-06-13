<?php
session_start();
if(!empty($_POST)){
    if($_POST['exit'] === '1'){
        if(isset($_SESSION['auth'])){
            session_destroy();
            header("Location: http://med/teleMed/teleMed.php");
            
        }else if(isset($_SESSION['authDoc'])){
            session_destroy();
            header("Location: http://med/teleMed/teleMed.php");
            
        }else{
            header("Location: http://med/teleMed/teleMed.php");
            
        }
    }
}