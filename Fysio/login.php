<?php 
    include("mysql.php");
    
    session_start();
    include_once 'header.php';
    if (isset($_SESSION['id'])) {
        header('location: index.php');
    } 
?>

<section class="signup-form">
    <div class="signup-form-form">

     <form class="form-login" action="login-backend.php" method="post">
     <h2>Login</h2>

        <label for="number">Telefonnr.</label>
        <input type="text" name="number" placeholder="  Brugernavn...">

        <label for="password">Adgangskode</label>
        <input type="password" name="password" placeholder="    Adgangskode...">

        <button type="submit" name="submit">Login</button>
        <div class="opret-bruger"><a href="register.php">Opret bruger</a></div> 
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyField") {
                    echo "<p style='text-align:center; color: red;'>Udfyld alle felter </p>";
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
</section>
<?php
 include_once 'footer.php';
?>


