
<!-- footer -->
<footer>
<!-- logo -->
<div class="logo"><span>Mark</span>Skals</div>

<!-- some -->
<div class="social-media">
    <a href="https://www.facebook.com" class="fa fa-facebook"></a>
    <a href="https://www.instagram.com" class="fa fa-instagram"></a>
    <a href="https://www.linkedin.com" class="fa fa-linkedin"></a>
    <a href="https://www.twitter.com" class="fa fa-twitter"></a>
</div>
<!-- menu -->
<div class="footer-container">
    <div class="footer-wrapper">
        <h4>Mark Skals</h4>
        <p>Rolundvej 1, 5260 Odense S</p>
        <a href="mailto:markskals@fysioterapi.dk">markskals@fysioterapi.dk</a>
        <p>Tlf: +45 01020304</p>
    </div>

    <div class="footer-wrapper">
        <h4>Hurtig adgang</h4>
        <a href="#anchor-about">Om Mark Skals</a>
        <a href="#anchor-behandlinger">Behandling</a>
        <a href="#anchor-contact">Kontakt</a>
    </div>

    <div class="footer-wrapper">
        <h4>Til klienten</h4>

    <?php 
        if(isset($_SESSION['number'])) {
        echo"<a href='profil.php'>Min profil</a>";
        }
    ?>
        <a href="kalender.php">Bestil tid</a>
    </div>

    <div class="footer-wrapper">
        <h4>Nyhedsbrev</h4>
        <p>Tilmeld dig nyhedsbrevet og modtag de seneste opdateringer</p>
        <div class="footer-newsletter">
            <input type="email" placeholder="eksempel@gmail.com">
            <button>SEND</button>
        </div>
    </div>
</div>
<!-- webright -->
<hr class="divider">
<div class="webright">
    <div class="webright-left">
        © 2022 1. Semester webudvikling EAAA. 
    </div>
    <div class="webright-right">
        <a href="404.php">Vilkår</a>
        <a href="404.php">Cookiepolitik</a>
        <a href="404.php">Privatlivspolitik</a>
    </div>
</div>
</footer>
<script src="js/script.js"></script>