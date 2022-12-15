<?php 
    include("mysql.php");
    
    session_start();
    include_once 'components/header.php';
    if (isset($_SESSION['id'])) {
        header('location: index.php');
    } 
?>

<div class="login-form">
<div class="contact-heading">
        <h2>Log ind</h2>
</div>

    <div class="login-form-form">
    
     <form class="form-login" action="login-backend.php" method="post">

        <label for="number">Telefonnr.</label>
        <input type="text" name="number" placeholder="Brugernavn...">

        <label for="password">Adgangskode</label>
        <input type="password" name="password" placeholder="Adgangskode...">

        <button class="default-button" type="submit" name="submit">Login</button>
        <div class="opret-bruger"> <p>Ikke oprettet endnu?</p><a href="register.php">Opret bruger</a></div> 
        <!-- Hvis login-processen ikke går igennem, returnerer backenden med en givet fejl - med dem vil vi herunder give brugeren besked om, hvor fejlen skete. -->
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyField") {
                    echo "<p style='text-align:center; color: red;'>Alle felter skal udfyldes</p>";
                }
                else if ($_GET["error"] == "wrongLogin") {
                    echo "<p style='text-align:center; color: red;'>Forkert login, prøv igen </p>";
                }
                else if ($_GET["error"] == "noLogin") {
                    echo "<p style='text-align:center; color: red;'>Du er ikke logget ind </p>";
                }
                else if ($_GET["error"] == "noUser") {
                    echo "<p style='text-align:center; color: red;'>Ingen bruger fundet </p>";
                }
            } 
        ?>
     </form>
    
    </div>
 </div>
<?php
 include_once 'components/footer.php';
?>


