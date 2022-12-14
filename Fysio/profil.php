<?php 
    include("mysql.php");
    
    session_start();
    include_once 'header.php';
    if (isset($_SESSION['id'])) {
        header('location: index.php');
    } 
?>
<section class="profilSection">
    <div class="profilBoks">
        <div class="picInfo">
            <div class="profilePic"></div>
                <ul>
                    <li>Efternavn, Navn</li>
                    <li>Brugernavn</li>
                    <li>Tlf: +45 88888888</li>
                    <li>Email: Email@gmail.com</li>
                </ul>
                <p class="redOp">Rediger oplysninger</p>
        </div>
        
        <h3>Mine Aftaler</h3>
        <div class="mineAftaler">
        <div class="aftaleTop">  
        <div class="aftaleDato">
                <p>D. 15. Dec. 2022 | Kl. 12:30</p>
            </div>
            <p>Hos Mark Skals</p>
            <p>Adresse: Rentemestervej 8 Odense</p>
            </div> 
            <div class="aftaleInfo">
                <p>Jeg har problemer i/omkring lysken, og har svært ved at løbe. skaden opstod i forbindelse 
                med ishockey, hvor jeg i en spurt overanstrængte/forstrækte noget deromkring</p>
            </div>
            <div class="aftaleBot">
                <button class="aflysTid"><i class="fa-solid fa-trash-can"></i>Aflys tid</button>
                <button class="redigerTid"><i class="fa-solid fa-pencil"></i>Rediger tid</button>
            </div>
        </div>
        <h3>Tidligere Aftaler</h3>
        <div class="mineAftaler">
        <div class="aftaleTop">  
        <div class="aftaleGammelDato">
                <p>D. 15. Dec. 2022 | Kl. 12:30</p>
            </div>
            <p>Hos Mark Skals</p>
            <p>Adresse: Rentemestervej 8 Odense</p>
            </div> 
            <div class="aftaleInfo">
                <p>Jeg har problemer i/omkring lysken, og har svært ved at løbe. skaden opstod i forbindelse 
                med ishockey, hvor jeg i en spurt overanstrængte/forstrækte noget deromkring</p>
            </div>
        </div>

    </div>
</section>
<?php
 include_once 'footer.php';
?>
