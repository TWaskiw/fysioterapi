 <?php
    session_start(); 
    include("mysql.php");
?> 

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



