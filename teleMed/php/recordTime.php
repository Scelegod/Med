<?php
$sql = "select * from timepers";
                    
$arr = [];
$year = date('Y');
$month = date('n');
$oclock = 23;
$minuts = 59;
$seconds = 59;
$days_month = date('t', mktime(0, 0, 0, $month, 1, $year));
$day = date('j');
$today = $day .'.'.  $month .'.'. $year; 
for ($day = 1; $day <= $days_month; $day++) {
    if (time() < strtotime($oclock . ':' . $minuts . ':' . $seconds . ' ' . $day . '.' . $month . '.' . $year) and date('w', strtotime($day . '.' . $month . '.' . $year)) != 6 and date('w', strtotime($day . '.' . $month . '.' . $year))) {
        $arr[] = $day;
    }
}
if($result = $link->query($sql)){
    foreach($result as $row){
        echo          '<div data-persid="' . $row["PersonalCode"] . '" class="time__tab2 dispnone">';
        foreach($arr as $day){
            echo          '<div data-dateday="'.$day.'" class="time__tab">';
            echo          '<input data-dateday="'.$day.'" class="dayradio dispnone">';
            echo          '<div data-dataantime="'.$year.'-'.$month.'-'.$day.'" class="time__rec">'. $row["Monday"].'</div>';
            echo          '<div data-dataantime="'.$year.'-'.$month.'-'.$day.'" class="time__rec">'. $row["Tuesday"].'</div>';
            echo          '<div data-dataantime="'.$year.'-'.$month.'-'.$day.'" class="time__rec">'. $row["Wednesday"].'</div>';
            echo          '<div data-dataantime="'.$year.'-'.$month.'-'.$day.'" class="time__rec">'. $row["Thursday"].'</div>';
            echo          '<div data-dataantime="'.$year.'-'.$month.'-'.$day.'" class="time__rec">'. $row["Friday"].'</div>';
            echo          '</div>';
        }
            echo          '</div>';
    }
    $result->free();
}