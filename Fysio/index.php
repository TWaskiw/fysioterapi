 <?php 
session_start();
    include("mysql.php");
    include_once 'header.php'; 
?> 

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



