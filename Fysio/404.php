<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Siden eksisterer ikke</title>

</head>

<?php 
session_start();
    include("mysql.php");
    include_once 'components/header.php'; 
?> 

<body>
    
<section id="fejlside">
    <div title="404" class="fejl">404</div>
    <p class="fejlp">Siden du har forsøgt at finde eksisterer ikke</p>
</section>

