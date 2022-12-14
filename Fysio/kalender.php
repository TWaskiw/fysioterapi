<?php

include("mysql.php");
    
session_start();
include_once 'header.php';

function kalender($month, $year) {

    // Vi finder den første dag i nuværende måned
    $firstDayofMonth = mktime(0,0,0,$month,1,$year);

    // Vi finder antallet af dage i nuværende måned
    $numberDays = date('t', $firstDayofMonth);

    // Finder flere detaljer omkring datoen
    $dateComponents = getdate($firstDayofMonth);

    // Navn på nuværende måned
    $monthName = $dateComponents['month'];

    // Navn på nuværende dag
    $dayOfWeek = $dateComponents['wday'];

    // I dag
    $dateToday = date('Y-m-d');


    $kalender = "<table class='table'>";
    $kalender.="<h2>$monthName $year</h2>";
    $kalender.= "<a href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Sidste måned</a>";
    $kalender.= "<a href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Næste måned</a>";

    // Vi laver en array med alle ugens dage
    $daysofWeek = array('Søndag','Mandag','Tirsdag','Onsdag','Torsdag','Fredag','Lørdag');

    // Vi printer alle ugens dage
    foreach($daysofWeek as $day){
        $kalender.="<th class='header'>$day</th>";
    }

    $kalender.= "</tr><tr>";

    
    for($k=0;$k<$dayOfWeek;$k++){
        $kalender.="<td></td>";
    }

/*     if($dayOfWeek > 0) {
        for($k=0;$k<$dayOfWeek;$k++){
            $kalender.="<td></td>";
        }
    }
 */
    $currentDay = 1;
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while($currentDay <= $numberDays){
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $kalender.= "</tr><tr>";
        }

        // Hvis datoen vi er nået til i loopet matcher dagens dato, fremhæver vi den som "dagens dato" i kalenderen.
        $currentDayPadded = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayPadded";

        // Vi printer enten dagens dato eller en normal celle.
        if($dateToday==$date){
            $kalender.= "<td><a class='today' href='kalender.php?date=$date'>$currentDay</a></td>";
        } else {
            $kalender.= "<td><a class='nottoday' href='kalender.php?date=$date'>$currentDay</a></td>";
        }

        $kalender.= "</td>";

        // Da det er et while loop, slutter vi af med at ligge én til.
        $currentDay++;
        $dayOfWeek++;
    }

    if($dayOfWeek != 7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $kalender.="<td></td>";
        }
    }

    $kalender.="</tr></table>";

    echo $kalender;
}
?>

<?php

$dateComponents = getdate();
$month = $dateComponents['mon'];
$year =  $dateComponents['year'];

    echo  kalender($month, $year);
?>


<?php 
// Næste skridt er at brugeren skal vælge et bestemt tidspunkt at booke på den valgte dag.
$timeslot1 = "09:00";
$timeslot2 = "11:00";
$timeslot3 = "13:00";

$timeslot1_booked = false;
$timeslot2_booked = false;
$timeslot3_booked = false;

if(isset($_REQUEST["date"])){
    $_SESSION['dato'] = $_REQUEST["date"];
$dato = $_SESSION['dato'];
echo $dato;

$sql_booking = "SELECT * FROM bookings WHERE dato='$dato'";
$res_booking = mysqli_query($mySQL, $sql_booking) or die(mysqli_error($mySQL));

if (mysqli_num_rows($res_booking) > 0 ) {
 while($row = $res_booking->fetch_assoc()) {
    $timeslot1_booked = $row["timeslot1"] == "1";
    $timeslot2_booked = $row["timeslot2"] == "1";
    $timeslot3_booked = $row["timeslot3"] == "1";
  }
  
} 
    if($timeslot1_booked == false){ 
        echo "<a class='ledigtid' href='kalender.php?date=$dato&tid=$timeslot1'>$timeslot1</a>";
    } 
        if($timeslot2_booked == false){
            echo "<a class='ledigtid' href='kalender.php?date=$dato&tid=$timeslot2'>$timeslot2</a>";
    } 
        if($timeslot3_booked == false){
            echo "<a class='ledigtid' href='kalender.php?date=$dato&tid=$timeslot3'>$timeslot3</a>";
    }
}



if(isset($_REQUEST["tid"])){
    $tid = $_REQUEST["tid"];
} 




?>

