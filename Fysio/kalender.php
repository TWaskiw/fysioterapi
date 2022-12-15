<?php

include("mysql.php");
    
session_start();
include_once 'components/header.php';

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


    $kalender = "<div class='kalender'><table class='table'>";
    $kalender.="<h2>$monthName $year</h2>";

/*     $kalender.= "<a href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Sidste måned</a>";
    $kalender.= "<a href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Næste måned</a>"; */

    // Vi laver en array med alle ugens dage
    $daysofWeek = array('Søndag','Mandag','Tirsdag','Onsdag','Torsdag','Fredag','Lørdag');

    // Vi printer alle ugens dage
    foreach($daysofWeek as $day){
        $kalender.="<th class='header'>$day</th>";
    }

    $kalender.= "</tr><tr>";

    
    for($k=0;$k<$dayOfWeek;$k++){
        $kalender.="<td></td></div>";
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
            $kalender.= "<td><a class='today' value='tider' onclick='callAPI('ledigetider', '$date')' href='kalender.php?date=$date'>$currentDay</a></td>";
        } else if ($date>$dateToday) {
            $kalender.= "<td><a class='nottoday' href='kalender.php?date=$date'>$currentDay</a></td>";
        } else {
            $kalender.= "<td class='daypassed'>$currentDay</td>";
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

    $kalender.="</tr></table></div>";

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


if(isset($_REQUEST["date"])){
    $_SESSION['dato'] = $_REQUEST["date"];
$dato = $_SESSION['dato'];
echo "<p class='valgtDato'>Du har valgt $dato</p>";


if($dato < date('Y-m-d')) {
    header('location: kalender.php?error=ugyldigDato');
    exit();
}

// Næste skridt er at brugeren skal vælge et bestemt tidspunkt at booke på den valgte dag.
$ledigetider = "<div class='ledigetider'>";

// Vi sætter alle tider til en variabel, så vi har noget at sammenligne med, når vi tjekker hvilke der allerede er booket i backenden.
$timeslot1 = "09:00";
$timeslot2 = "11:00";
$timeslot3 = "13:00";

// Dette er variablerne vi vil bruge til at printe en evt ledig tid. Dem sætter vi lig med false til at starte med.
$timeslot1_booked = false;
$timeslot2_booked = false;
$timeslot3_booked = false;

// Nu leder vi i databasen efter bookinger med den dato, som brugeren har trykket på.
$sql_booking = "SELECT * FROM bookingsList WHERE dato='$dato'";
$res_booking = mysqli_query($mySQL, $sql_booking) or die(mysqli_error($mySQL));

// 
if (mysqli_num_rows($res_booking) > 0 ) {
 while($row = $res_booking->fetch_assoc()) {
    $timeslot1_booked = $timeslot1_booked || $row["timeslot"] == $timeslot1;
    $timeslot2_booked = $timeslot2_booked || $row["timeslot"] == $timeslot2;
    $timeslot3_booked = $timeslot3_booked || $row["timeslot"] == $timeslot3;
  }
  
} 
$ledigetider = "<div class='ledigetider'>";
    if($timeslot1_booked == 0){ 
        $ledigetider.="<a class='ledigtid' href='kalender.php?date=$dato&tid=$timeslot1'>$timeslot1</a>";
            $_SESSION['tid'] = $timeslot1;
    } 
        if($timeslot2_booked == 0){
        $ledigetider.="<a class='ledigtid' href='kalender.php?date=$dato&tid=$timeslot2'>$timeslot2</a>";
            $_SESSION['tid'] = $timeslot2;
    } 
        if($timeslot3_booked == 0){
        $ledigetider.="<a class='ledigtid' href='kalender.php?date=$dato&tid=$timeslot3'>$timeslot3</a>";
            $_SESSION['tid'] = $timeslot3;
    }
    if(isset($_REQUEST["tid"])){
    $_SESSION['tid'] = $_REQUEST["tid"];
    $tid = $_SESSION['tid'];}
    echo $ledigetider;
}
$ledigetider = "</div>";
echo $ledigetider;



?>
<div class="bestilling-form">
<form class="form-bestilling" action="booking-backend.php" name="booking" method="post">
                <label for="name">Navn</label>
                <input type="text" name="name" required <?php if(isset($_SESSION['firstname'])!=""){ 
                    echo " value='".$_SESSION['firstname']."'"; }?>
                ><br>

                <label for="email">Email</label>
                <input type="text" name="email" required <?php if(isset($_SESSION['email'])!=""){ 
                    echo " value='".$_SESSION['email']."'"; }?>><br>

                <label for="number">Telefon nummer</label>
                <input type="number" name="number" required <?php if(isset($_SESSION['number'])!=""){ 
                    echo " value='".$_SESSION['number']."'"; }?>><br>
  <input class="button-bestil" type="submit" value="Bekræft bestilling">
</form> 
</div>

