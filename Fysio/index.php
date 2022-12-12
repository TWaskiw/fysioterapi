 <?php 
session_start();
    include("mysql.php");
    include_once 'header.php'; 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forside</title>
</head>
<body>
    
<main class="hero-section">
  <section class="container">
    <div class="hero-content">

    <div class="hero-text">
        <h2 class="hero-welcome-text">Fysioterapi med 
dig i</h2>
        <h1 class="hero-big">FOKUS</h1>
        <p class="hero-text-description">Jeg har over 5 års erfaring  med alt fra småskader, sportsskader massage og meget mere.</p>
        <button class="default-button">Læs mere <i class="fa-solid fa-arrow-right"></i></button>
      </div>
    </div>

  </section>
</main>

<div class="fcontainer">
    <h1>Page<span>splitter</span></h1>
</div>

<?php
  include_once 'behandlinger.php';
  include_once 'contact.php';
  include_once 'testimonials.php'; 
  include_once 'footer.php'; 
?>



