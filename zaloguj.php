<section class="content">
	<h2><span class="wyr">Zaloguj</span> się</h2>
	<div class="main">
		<div class="plansza">
			<?php include 'flash.php'; ?>
			<form action="index.php?p=zaloguj&zaloguj" method="post">
				<p>Adres e-mail</p>
				<input type="text" name="mail" class="pole">
				<p>Hasło</p>
				<input type="password" name="haslo" class="pole">
				<p><input type="submit" value="Zaloguj się"></p>
				<p>Nie masz jeszcze konta? <a href="index.php?p=zarejestruj">Zarejestruj się</a></p>
			</form>
		</div>
	</div>
</section>