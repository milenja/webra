<?php
session_start();
require 'config.php';
include 'webra.php';
$webra = new Webra();
if (isset($_GET["zamow"])) {
	$webra->zlozZamowienie();
}
if (isset($_GET['zaloguj'])) {
	$webra->zaloguj();
}
if (isset($_GET['zarejestruj'])) {
	$webra->zarejestruj();
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
		<script src="skrypty/skrypt.js"></script>
	</head>
	<body>
		<div class="calosc">
			<header>
				<div class="akcja">
					<?php
					if (!$webra->zalogowany()) {
						?>
						<a href="index.php?p=zaloguj">Zaloguj się</a> | <a href="index.php?p=zarejestruj">Zarejestruj się</a>
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
							<li><a href="index.php?p=oferta">Oferta</a></li>
							<li><a href="index.php?p=portfolio">Portfolio</a></li>
							<li><a href="index.php?p=kontakt">Kontakt</a></li>
						</ul>
					</nav>
				</div>
			</header>