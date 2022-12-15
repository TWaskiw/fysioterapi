<?php
    include("mysql.php");
    session_start();
    include_once("functions/functions.php");

        // Vi tjekker først at brugeren har trykket på "Login" (submit-knappen), før vi kører koden der logger brugeren ind.
    if (isset($_POST["submit"])) {

        // Vi henter dataen fra input-felterne vha. $_REQUEST og sætter dem lig med variabler vi kan bruge i koden. 
        $number = $_REQUEST["number"];
        $password = $_REQUEST["password"];

        // Vi tjekker om alle felterne er udfyldt
        if(signInEmpty($number, $password) == true){
            header('location: login.php?error=emptyField');
            exit();
        }


        // Vi bruger SQL statement SELECT til at finde brugeren i databasen - så har vi også fat i brugerens hashede password. 
        $sql_user = "SELECT * FROM userPass WHERE number='$number'";
        $result = $mySQL->query($sql_user);
        $row = $result->fetch_assoc();

        $hashedPassword = $row["password"];
        $number = $row["number"];
        $checkPassword = password_verify($password, $hashedPassword);


        if ($checkPassword === false){
            header('location: login.php?error=wrongLogin');
            exit();
        } else if ($checkPassword === true) {
            $_SESSION['number'] = $number;
            header('location: profil.php');
        } 

    }

?>