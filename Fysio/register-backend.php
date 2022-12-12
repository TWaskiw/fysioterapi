<?php
    include("mysql.php");
    session_start();

    if(isset($_POST['submit'])) {

        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $number = $_REQUEST["number"];
        $email = $_REQUEST["email"];
        $gender = $_REQUEST["gender"];
        $password = $_REQUEST["password"];
        $passwordRepeat = $_REQUEST["passwordRepeat"];

        if(isset($_POST['firstname']) !=""){
        $_SESSION['firstname'] = $_POST['firstname'];}

        if(isset($_POST['lastname']) !=""){
        $_SESSION['lastname'] = $_POST['lastname'];}

        if(isset($_POST['number']) !=""){
        $_SESSION['number'] = $_POST['number'];}

        if(isset($_POST['email']) !=""){
        $_SESSION['email'] = $_POST['email'];}


        $sql_user = "SELECT * FROM userPass WHERE number='$number'";
        $res_user = mysqli_query($mySQL, $sql_user) or die(mysqli_error($mySQL));

        if(empty($firstname) || empty($lastname) || empty($number) || empty($email) || empty($gender) || empty($password)){
            header('location: register.php?error=emptyField');
            exit();
        }
        
        if (mysqli_num_rows($res_user) > 0 ) {
            $_SESSION['number'] = "";
            header('location: register.php?error=numberTaken');
            exit();
        }
        
        if($password !== $passwordRepeat){
            header('location: register.php?error=wrongPassword');
            exit();
        }

         else {
            $newUser = "INSERT INTO userTable (firstname, lastname, number, email, gender)
            VALUES ('$firstname','$lastname','$number','$email','$gender')";
            $mySQLfind = $mySQL->query($newUser);

            $findUser = "SELECT id FROM userTable ORDER BY id DESC LIMIT 1";
            $response = $mySQL->query($findUser);
            $data = $response->fetch_object();
            
            $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $signupPass = "INSERT INTO userPass (id, number, password) 
            VALUES ('$data->id','$number', '$passwordHash')";
            $response = $mySQL->query($signupPass);

            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['number']);
            unset($_SESSION['email']);
            unset($_SESSION['number']);

            header('location: register.php?error=none');
            }
        }

?>