<?php
session_start();
global $mysqli;
$mysqli = @new mysqli("mysql2.mydevil.net", "m12382_avalanche", "wscieKlaowca303", "m12382_webra");
require 'funkcje.php';
if(isset($_GET["zamow"])) {
    $zamowienie = implode(';', $_POST['zamowienie']);
    $uwagi = 'Uwagi: '.$_POST['uwagi'];
    $_SESSION['zamowienie'] = array($zamowienie, $uwagi);
    //if(user_zalogowany()) {
    if(zalogowany()) {
        header("Location: panel.php?p=zamow");
    } else {
        header("Location: zaloguj.php");
    }
}
if(isset($_GET['zaloguj'])) {
    zaloguj();
}
if(isset($_GET['zarejestruj'])) {
    zarejestruj();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Webra - Unikalne strony WWW</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
    <div class="calosc">
        <header>
           <div class="akcja">
<?php
if(!zalogowany()) {
    ?>
               <a href="zaloguj.php">Zaloguj się</a> | <a href="zarejestruj.php">Zarejestruj się</a>
    <?php
} else {
    ?>
                <a href="panel.php">Panel</a> | <a href="panel.php?wyloguj">Wyloguj się</a>
    <?php
}
?>
           </div>
           <div class="hl">
               <h1>Webra</h1>
               <p>Unikalne strony WWW</p>
           </div>

           <div class="hp">
               <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="oferta.php">Oferta</a></li>
                        <li><a href="portfolio.php">Portfolio</a></li>
                        <li><a href="kontakt.php">Kontakt</a></li>
                    </ul>
                </nav>
           </div>
        </header>