<?php
include("mysql.php");

class BookingList {
 
    public $bookings; 
 
    public function __construct($number) {
        global $mySQL;
        $sqlQuery = "SELECT * FROM bookingsList WHERE phonenumber='$number'";
        $this->bookings = mysqli_fetch_assoc($mySQL->query($sqlQuery));

    }

}

