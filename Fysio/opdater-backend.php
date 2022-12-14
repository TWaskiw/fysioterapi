<?php
    include("mysql.php");
    session_start();
    if(!isset($_SESSION['number'])) {
    header('location: login.php?error=noLogin');
    exit;
}

    if(isset($_POST['update'])) { 
        $number = $_SESSION['number'];

        $name = $_REQUEST["name"];
        $lastname = $_REQUEST["lastname"];
        $email = $_REQUEST["email"];


        if(empty($name) || empty($lastname) || empty($email)){
            header('location: profil.php?status=fail_empty');
            exit();
        }

        $sql = "UPDATE userTable SET firstname='$name', lastname='$lastname', email='$email' WHERE number='$number'";
        $query_update = mysqli_query($mySQL, $sql);
      if ($query_update) {
            header('location: profil.php?status=success');
        } else {
            header('location: profil.php?status=fail');
        }
    }

?>