<?php 
    include("mysql.php");
    session_start();
    include_once 'header.php';
  /*   if(isset($_SESSION['id'])) {
    header('location: welcome.php?status=loggedin');
    exit; 
    } */


?>

<html>
<body>

<form class="form-register" action="register-backend.php" name="register" method="post">
    <div class="form-form-register">
    <h2>Opret bruger</h2>
        <div class="form-flex">
            <div class="register-info">
                <label for="firstname">Fornavn</label>
                <input type="text" name="firstname" <?php if(isset($_SESSION['firstname'])!=""){ 
                    echo " value='".$_SESSION['firstname']."'"; }?>
                ><br>

                <label for="lastname">Efternavn</label>
                <input type="text" name="lastname" <?php if(isset($_SESSION['lastname'])!=""){ 
                    echo " value='".$_SESSION['lastname']."'"; }?>><br>

                <label for="number">Telefon nummer</label>
                <input type="number" name="number" <?php if(isset($_SESSION['number'])!=""){ 
                    echo " value='".$_SESSION['number']."'"; }?>><br>

                <label for="email">E-Mail</label>
                <input type="text" name="email" <?php if(isset($_SESSION['email'])!=""){ 
                    echo " value='".$_SESSION['email']."'"; }?>><br>

                <label for="gender">Køn</label>
                <select type="text" name="gender">
                    <option value="mand">Mand</option>
                    <option value="kvinde">Kvinde</option>
                </select><br>
            </div>
            <div class="register-login">
                    <label for="password">Kodeord</label>
                    <input type="password" name="password"><br>

                    <label for="passwordRepeat">Gentag kodeord</label>
                    <input type="password" name="passwordRepeat"><br>
                    <button type="submit" name="submit">Tilmeld</button>
                    <?php 
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyField") {
                                echo "<p class='register-error'>Udfyld alle felter </p>";
                            }
                            else if ($_GET["error"] == "userTaken") {
                                echo "<p class='register-error'>Beklemailr, brugernavn er allerede temailt </p>";
                            } 
                            else if ($_GET["error"] == "wrongPassword") {
                                echo "<p class='register-error'>Kodeord stemmer ikke overens </p>";
                            }
                            else if ($_GET["error"] == "none") {
                                echo "<p class='register-success'>Du er nu registreret! Gå til <a href='login.php'>Login</a></p>";
                            }
                        }
                    include_once 'footer.php';
                    ?>
            </div>
        </div>
    </div>
</form>

