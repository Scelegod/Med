<?php

$nowData = date('Y').'-'.date('n').'-'.date('j');
$sql = "select * from record where `Data`>'$nowData'";

if($result = $link->query($sql)){
    foreach($result as $row){
        echo '<div class="dispnone recBlockPers" data-persid="'.$row['PersonalCode'].'">';
        echo '<div class=" recBlockData">'.$row['Data'].'</div>';
        echo '<div class=" recBlockTime">'.$row['Time'].'</div>';
        echo '</div>';
    }
    $result->free();
}