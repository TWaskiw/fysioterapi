<?php

include("mysql.php");
    
session_start();
include_once 'header.php';

function kalender($month, $year) {

    $daysofWeek = array('Søndag','Mandag','Tirsdag','Onsdag','Torsdag','Fredag','Lørdag');

    $firstDayofMonth = mktime(0,0,0,$month,1,$year);
    $numberDays = date('t', $firstDayofMonth);
    $dateComponents = getdate($firstDayofMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $dateToday = date('Y-m-d');

    $kalender = "<table class='table'>";
    $kalender.="<h2>$monthName $year</h2>";
    $kalender.= "<a href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Sidste måned</a>";
    $kalender.= "<a href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Næste måned</a>";

    foreach($daysofWeek as $day){
        $kalender.="<th class='header'>$day</th>";
    }

    $kalender.= "</tr><tr>";

    if($dayOfWeek > 0) {
        for($k=0;$k<$dayOfWeek;$k++){
            $kalender.="<td></td>";
        }
    }

    $currentDay = 1;
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while($currentDay <= $numberDays){

        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $kalender.= "</tr><tr>";
        }

        $currentDayRel = str_pad($month, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";


        if($dateToday==$date){
            $kalender.= "<td class='today'><h4>$currentDay</h4>";
        } else {
            $kalender.= "<td><h4>$currentDay</h4>";
        }

        $kalender.= "</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if($dayOfWeek != 7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $kalender.="<td></td>";
        }
    }

    $kalender.="</tr>";
    $kalender.="</table>";

    echo $kalender;


}
?>

<?php

$dateComponents = getdate();
$month = $dateComponents['mon'];
$year =  $dateComponents['year'];

    echo  kalender($month, $year);
?>