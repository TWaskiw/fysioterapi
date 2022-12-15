<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fysioterapi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>

<nav>
    <ul class="menu">
    <?php 
        if(isset($_SESSION['number'])) {
            echo "<li class='navlogo'><a href='index.php'><span>Mark</span>Skals</a></li>";
            echo "<li class='item'><a href='index.php#anchor-behandlinger'>Behandlinger</a></li>";
            echo "<li class='item'><a href='index.php#anchor-about'>Om mig</a></li>";
            echo "<li class='item'><a href='index.php#anchor-contact'>Kontakt</a></li>";
            echo "<li class='item'><a href='profil.php'>Min side</a></li>";
            echo "<li class='item'><a href='logout.php'>Log ud</a></li>";
            echo "<li class='item button'><a href='kalender.php'>Bestil tid</a></li>";
        } else {
            echo "<li class='navlogo'><a href='index.php'><span>Mark</span>Skals</a></li>";
            echo "<li class='item'><a href='index.php#anchor-behandlinger'>Behandlinger</a></li>";
            echo "<li class='item'><a href='index.php#anchor-about'>Om mig</a></li>";
            echo "<li class='item'><a href='index.php#anchor-contact'>Kontakt</a></li>";
            echo "<li class='item'><a href='login.php'>Login</a></li>";
            echo "<li class='item button'><a href='kalender.php'>Bestil tid</a></li>";
        }
    ?>

        <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
</nav>

