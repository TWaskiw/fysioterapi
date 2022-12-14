<?php
    include("mysql.php");
    session_start();


    // Vi tjekker først at brugeren har trykket på "Tilmeld" (submit-knappen), før vi kører koden der opretter brugeren i databasen.
    if(isset($_POST['submit'])) {
        include_once("functions/functions.php");

        // Her tager vi alle indtastede input-værdier vha. $_REQUEST og sætter det lig med en variabel vi vil bruge i koden.
        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $number = $_REQUEST["number"];
        $email = $_REQUEST["email"];
        $gender = $_REQUEST["gender"];
        $password = $_REQUEST["password"];
        $passwordRepeat = $_REQUEST["passwordRepeat"];

        // Vi sætter fornavn, efternavn, telefonnummer og email i SESSION, så vi har dem hvis der sker fejl i første forsøg. Vi kan med SESSION udfylde felterne automatisk for brugeren.
        if(isset($_POST['firstname']) !=""){
        $_SESSION['firstname'] = $_POST['firstname'];}

        if(isset($_POST['lastname']) !=""){
        $_SESSION['lastname'] = $_POST['lastname'];}

        if(isset($_POST['number']) !=""){
        $_SESSION['number'] = $_POST['number'];}

        if(isset($_POST['email']) !=""){
        $_SESSION['email'] = $_POST['email'];}


        // Vi bruger her SQL statement SELECT til at gå ind i databasen, og lede efter mulige brugerer i databasen, der allerede er registreret med dette telefonnummer.
        $sql_user = "SELECT * FROM userPass WHERE number='$number'";
        $res_user = mysqli_query($mySQL, $sql_user) or die(mysqli_error($mySQL));

        // Vi begynder at kigge den indtastede information igennem, for at sikre brugeren ikke har begået fejl - og vi undgår fejl i databasen.
        // Først tjekker vi om alle felter er tomme
        if(emptySignUp($firstname, $lastname, $number, $email, $gender, $password) == true) {
            header('location: register.php?error=emptyField');
            exit();
        }
        
        
        // Så tjekker vi om der var nogen brugere allerede registreret med dette telefonnummer - hvis der ingen er, kører koden videre.
        if (mysqli_num_rows($res_user) > 0 ) {
            $_SESSION['number'] = "";
            header('location: register.php?error=numberTaken');
            exit();
        }
        
        // Her tjekker vi om de to kodeord stemmer overens - hvis det ikke gør, sender vi brugeren tilbage med valuen wrongPassword, som vi kan bruge til at give fejlmeddelse. 
        if($password !== $passwordRepeat){
            header('location: register.php?error=wrongPassword');
            exit();
        }

        // Nu har vi tjekket for de fejl vi ville, og hvis der ingen fejl er - opretter vi dem i databasen.
         else {
            // Vi bruger SQL statement INSERT til at indsætte brugeren indtastede VALUES i databasen (table userTable)
            $newUser = "INSERT INTO userTable (firstname, lastname, number, email, gender)
            VALUES ('$firstname','$lastname','$number','$email','$gender')";
            $mySQLfind = $mySQL->query($newUser);

            // Med det samme går vi ind og finder den nye bruger, for at kunne bruge databasens genererede ID, i tabellen hvor vi gemmer brugerens kodeord.
            $findUser = "SELECT id FROM userTable ORDER BY id DESC LIMIT 1";
            $response = $mySQL->query($findUser);
            $data = $response->fetch_object();

            // Før vi indsætter brugerens kordord i databasen, hasher vi den vha. password_hash.
            $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

            // Nu kan vi indsætte brugerens ID (samme som ID'et fra userTable, nu har vi altid rød trød mellem de to tabeller og brugerne), det hashede kordord og telefonnummer (som brugeren skal logge ind med).
            $signupPass = "INSERT INTO userPass (id, number, password) 
            VALUES ('$data->id','$number', '$passwordHash')";
            $response = $mySQL->query($signupPass);

            // Nu når brugeren er blevet oprettet i databasen uden nogle fejl, sletter vi de oprettede SESSION's, da brugeren ikke skal gøre flere forsøg i at oprette sig.
            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['number']);
            unset($_SESSION['email']);
            unset($_SESSION['number']);

            header('location: register.php?error=none');
            }
        }

?>