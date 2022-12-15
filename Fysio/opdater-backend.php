<?php
    include("mysql.php");
    session_start();
    if(!isset($_SESSION['number'])) {
    header('location: login.php?error=noLogin');
    exit;
}
// Vi tager fat i de informationer brugeren har indtastet og gerne vil have opdateret.
    if(isset($_POST['update'])) { 
        $number = $_SESSION['number'];

        $name = $_REQUEST["name"];
        $lastname = $_REQUEST["lastname"];
        $email = $_REQUEST["email"];

// Tjekker først om nogle af felterne er tomme
        if(empty($name) || empty($lastname) || empty($email)){
            header('location: profil.php?status=fail_empty');
            exit();
        }
// Hvis ingen er tomme, kører sql queryen der opdaterer den specifikke (ud fra $number) brugers informationer.
        $sql = "UPDATE userTable SET firstname='$name', lastname='$lastname', email='$email' WHERE number='$number'";
        $query_update = mysqli_query($mySQL, $sql);
      if ($query_update) {
            header('location: profil.php?status=success');
        } else {
            header('location: profil.php?status=fail');
        }
    }

?>