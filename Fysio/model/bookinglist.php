<?php
include("mysql.php");

class BookingList {
 
    public $bookings; 
 
    public function __construct($number) {
        global $mySQL;
        $sqlQuery = "SELECT * FROM bookingsList WHERE phonenumber='$number'";

        $rows = [];
        while($row = mysqli_fetch_array($mySQL->query($sqlQuery))) {
            $rows[] = $row;
        }

        $this->bookings = $rows;

    }

}
