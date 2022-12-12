<?php
    $server = "mysql106.unoeuro.com"; 
    $username = "waskiw_com";
    $password = "F3hpy2nxRfzG";
    $database = "waskiw_com_db_first";

$mySQL = new mysqli($server, $username, $password, $database);

if(!$mySQL) {
die("Could not connect to the MySQL server: " . mysqli_connect_error());
}

?>