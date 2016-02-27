<section class="content">
	<h2><span class="wyr">Skontaktuj się</span> z nami<br>Porozmawiajmy o Twoim pomyśle</h2>
	<div class="main">
		<h3>Kontakt</h3>
		<?php
		if (isset($_GET['kw'])) {
			/*
			 * @todo PHPMailer
			 */
		}
		?>
		<p><img src="ikonki/napisz.png" alt="E-mail" class="kontakt-ikona"> <a href="mailto:kontakt@webra.com.pl">kontakt@webra.com.pl</a></p>
		<p><img src="ikonki/zadzwon.png" alt="Telefon" class="kontakt-ikona tel"> <a href="tel:608 065 754">608 065 754</a></p>
		<p><img src="ikonki/zadzwon.png" alt="Telefon" class="kontakt-ikona tel"> <a href="tel:605 110 810">605 110 810</a></p>
		<h3>Zadaj pytanie</h3>
		<form action="?kw" method="post">
			<p>Imię i nazwisko:</p>
			<input type="text" name="imie" class="pole" placeholder="Imię i nazwisko">
			<p>E-mail:</p>
			<input type="text" name="email" class="pole" placeholder="Adres e-mail">
			<p>Temat:</p>
			<input type="text" name="temat" class="pole" placeholder="Temat">
			<p>Treść:</p>
			<textarea name="tresc" class="pole" placeholder="Treść wiadomości"></textarea>
			<p>
				<input type="submit" value="Wyślij wiadomość">
			</p>
		</form>
	</div>
</section>