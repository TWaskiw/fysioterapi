<?php
include("mysql.php");

function emptySignUp($firstname, $lastname, $number, $email, $gender, $password) {
    $result = "";
    if (empty($firstname) || empty($lastname) || empty($number) || empty($email) || empty($gender) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}






?>