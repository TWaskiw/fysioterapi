<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fysioterapi</title>
    <script src="https://kit.fontawesome.com/491b6e8995.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
<nav  class="navbar ">
    <div class="nav-logo">
        <h1 href="index.php"><span class="logo-span">Mark</span>Skals</h1></div>
        <div>
        <ul class="nav-links">
          <li>Om mig</li>
          <li>Behandling</li>
          <li>Kontakt</li>
        </ul>
        </div>
        <?php 
            if(isset($_SESSION['number'])) {
              echo "<div class='nav-button'><a href='profil.php' class='log-ind'>Min side</a><button class='default-button'>Bestil tid        <i class='fa-solid fa-arrow-right'></i></button></div>";
              echo "<li><a href='logout.php'>Log ud</a></li>'";
            } else {
                echo "<div class='nav-button'><a href='login.php' class='log-ind'>Login</a><button class='default-button'>Bestil tid        <i class='fa-solid fa-arrow-right'></i></button></div>";
            }
            ?>
      </nav>

