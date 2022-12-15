<?php
    include("mysql.php");
    session_start();
    include_once("functions/functions.php");

    $number = $_SESSION['number'];
    $id = $_POST["button"];

    if (isset($_POST["button"])) {
    deleteTid($id, $number);
    header('location: profil.php?deleteBooking=success');
    }


?>