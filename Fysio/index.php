 <?php 
    include("mysql.php");
    include_once 'components/header.php'; 
    session_start();
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
  include_once 'components/behandlinger.php';
  include_once 'components/ommig.php';
  include_once 'components/contact.php';
  include_once 'components/testimonials.php'; 
  include_once 'components/footer.php'; 
?>



