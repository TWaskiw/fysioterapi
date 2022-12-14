<?php 

include("mysql.php");
session_start();

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
/*     echo "dato: " . $row["dato"]. " - Name: " 
        .$row["timeslot1"]."".$row["timeslot2"]."<br>"; */
  }
} else {
    echo "Alle ledige";

    header('location: login.php?timeslot1=wrongLogin');

}

/*  else {
    $newUserInfo = "INSERT INTO userInfo (firstname, lastname, height, age, gender)
    VALUES ('$firstname','$lastname','$height','$age','$gender')";
    
    } */



?>
