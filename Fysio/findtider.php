<?php 

include("mysql.php");
session_start();

if(isset($_REQUEST["date"])){
    $dato = $_REQUEST["date"];
}



$sql = "SELECT * FROM bookings WHERE date='$dato'";
$result = $mySQL->query($sql);
if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "dato: " . $row["dato"]. " - Name: " 
            .$row["timeslot1"]."".$row["timeslot2"]."<br>";
      }
} 
else {
      echo "No records has been found";
}
?>