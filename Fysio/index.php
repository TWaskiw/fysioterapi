 <?php 
session_start();
    include("mysql.php");
    include_once 'header.php'; 
?> 

<body>
    
<main class="hero-section">
  <div class="hero2">
  <fieldset class="hero2-text">
      <legend class="border-text">&nbsp; Mark Skals</legend>
  <h1>Fysioterapi med dig i fokus</h1>
  <p>Jeg har over 5 års erfaring  med alt fra småskader, sportsskader massage og meget mere.</p>
    <a href="#scroll2"><button>Læs mere</button></a>
  </fieldset></div>
</main>

<?php
  include_once 'behandlinger.php';
  include_once 'ommig.php';
  include_once 'contact.php';
  include_once 'testimonials.php'; 
  include_once 'footer.php'; 
?>



