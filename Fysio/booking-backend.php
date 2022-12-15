<?php 

include("mysql.php");
include_once("functions/functions.php");
session_start();

    // Her tager vi de indtastede input-værdier ved at bruge $_REQUEST og $_SESSION og sætter det lig med variabelen vi skal bruge i koden.
$dato = $_SESSION['dato'];
$tid = $_SESSION['tid'];
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$number = $_REQUEST["number"];

// Vi begynder at kigge den indtastede information igennem, for at sikre brugeren ikke har begået fejl - og vi undgår fejl i databasen.
   // Først tjekker vi om alle felter er tomme
   if(emptyBooking($dato, $tid, $name, $email, $number) == true){
    header('location: kalender.php?error=emptyField');
    exit();
}


// Inden vi godkender bestillingen, går vi ind og tjekker igen om tiden allerede er bestilt. En sikkerhedsforanstaltning HVIS en anden bruger, skulle have bokket et par sekunder før f.eks.
$sql_time = "SELECT * FROM bookingsList WHERE dato='$dato' AND timeslot='$tid'";
$res_user = mysqli_query($mySQL, $sql_time) or die(mysqli_error($mySQL));

// Så tjekker vi om der var nogen brugere allerede registreret med dette telefonnummer - hvis der ingen er, kører koden videre.
if (mysqli_num_rows($res_user) > 0 ) {
    header('location: kalender.php?error=numberTaken');
    exit();
}


// Nu har vi tjekket for de fejl vi ville, og hvis der ingen fejl er - opretter vi dem i databasen.
 else {
    // Vi bruger SQL statement INSERT til at indsætte brugeren indtastede VALUES i databasen (table userTable)
    $sql = "INSERT INTO bookingsList (dato, timeslot, phonenumber)
    VALUES ('$dato', '$tid', '$number')";

if ($mySQL->query($sql) === TRUE) {
    header('location: index.php?booking=success');
    unset($_SESSION['name']);
    unset($_SESSION['dato']);
    unset($_SESSION['tid']);
    unset($_SESSION['email']);
  } else {
    echo "Error: " . $sql . "<br>" . $mySQL->error;
  }
 }
