<?php
include("mysql.php");

class BookingList {
 
    public $bookings; 
    public $oldbookings;

    // Vi henter alle bookinger ud fra brugerens telefonnummer fra databasen, og inddeler dem i henholdsvis gamle bookinger ($oldbookings) og kommende bookings ($bookings).
    public function __construct($number) {
        global $mySQL;
        $sqlQuery = mysqli_query($mySQL,"SELECT * FROM bookingsList WHERE phonenumber='$number'  AND dato >= now() ORDER BY dato");

        $rows = [];
        while($row = mysqli_fetch_array($sqlQuery)) {
            $rows[] = $row;
        }

        $this->bookings = $rows;

        $sqlQuery = mysqli_query($mySQL,"SELECT * FROM bookingsList WHERE phonenumber='$number' AND dato < now() ORDER BY dato");

        $rows = [];
        while($row = mysqli_fetch_array($sqlQuery)) {
            $rows[] = $row;
        }

        $this->oldbookings = $rows;


    }

}