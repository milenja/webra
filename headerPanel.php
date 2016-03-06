<?php
session_start();
require 'config.php';
include 'webra.php';
$webra = new Webra();
$webra->wymusLogowanie();
?>
    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <title>Webra - Panel klienta</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/style-panel.css">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="/skrypty/skrypt.js"></script>
    </head>

    <body>
        <div class="calosc">
            <div class="lewa"></div>
            <div class="prawa">
                <header>
                    <div class="akcja">
                        <a href="/index">Wróć do strony</a> | <a href="/index/wyloguj">Wyloguj się</a>
                    </div>
                    <h1>Panel klienta</h1>
                </header>
                <nav>
                    <ul>
                        <li><a href="/panel">Start</a></li>
                        <li><a href="/panel/dane">Moje dane</a></li>
                        <li><a href="/panel/zamowienia">Moje zamówienia</a></li>
                        <?php
						if (!empty($_SESSION['zamowienie']) && !(isset($_GET['p']) && ($_GET['p'] == 'zamow' || $_GET['p'] == 'zatwierdz'))) {
							?>
                            <li><a href="/panel/zamow">Dokończ składanie zamówienia</a></li>
                            <?php
						}
						?>
                    </ul>
                </nav>
                