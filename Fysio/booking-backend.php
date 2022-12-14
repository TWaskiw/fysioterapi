<?php 

include("mysql.php");
session_start();

$dato = $_SESSION['dato'];
$tid = $_SESSION['tid'];
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$number = $_REQUEST["number"];

echo $dato;
echo $tid;
echo $name;
echo $email;
echo $number;
/* 
if(isset($_POST['submit'])) {

        // Her tager vi alle indtastede input-værdier vha. $_REQUEST og sætter det lig med en variabel vi vil bruge i koden.
        $firstname = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $number = $_REQUEST["number"];

        echo $firstname;

    } */



/* 
if(isset($_REQUEST["date"])){
    $dato = $_REQUEST["date"];
}


$sql_booking = "SELECT * FROM bookings WHERE dato='$dato'";
$res_booking = mysqli_query($mySQL, $sql_booking) or die(mysqli_error($mySQL));

if (mysqli_num_rows($res_booking) > 0 ) {
 echo "der er mindst én booking denne dato";
 while($row = $res_booking->fetch_assoc()) {
    if($row["timeslot1"] == "1"){
        $_SESSION['timeslot1'] = "not available";
    }

  }
} else {
    echo "Alle ledige";



} */

/*  else {
    $newUserInfo = "INSERT INTO bookingList (dato, timeslot, phonenumber)
    VALUES ('$firstname','$lastname','$height')";
    
    } */



?>
