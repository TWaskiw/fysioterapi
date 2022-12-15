<?php
include("mysql.php");

/* Sign Up */
function emptySignUp($firstname, $lastname, $number, $email, $gender, $password) {
    $result = "";
    if (empty($firstname) || empty($lastname) || empty($number) || empty($email) || empty($gender) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function checkPasswordRepeat($password, $passwordRepeat) {
    $result = "";
    if(($password !== $passwordRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


/* Login */
function signInEmpty($number, $password) {
    $result = "";
    if (empty($number) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}



/* Booking */
function emptyBooking($dato, $tid, $name, $email, $number) {
    $result = "";
    if (empty($dato) || empty($tid) || empty($name) || empty($email) || empty($number)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/* Slet aftale funktion */
function deleteTid($id, $number) {
    global $mySQL;
    $sql_slet = "DELETE FROM bookingsList WHERE id=$id AND phonenumber='$number'";
    $result = $mySQL->query($sql_slet);
};



?>