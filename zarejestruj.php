<?php include 'header.php'; ?>
        <section class="content">
            <h2><span class="wyr">Zarejestruj</span> się</h2>
            <div class="main">
                <div class="plansza">
<?php
if(isset($_SESSION['msg']) && $_SESSION['msg'] !== NULL)
{
	?>
	<div class="msg">
	<?php
	echo $_SESSION['msg'];
	$_SESSION['msg'] = NULL;
	?>
	</div>
	<?php
}
?>
                    <form action="zarejestruj.php?zarejestruj" method="post">
                        <p>Imię i nazwisko<br>LUB nazwa firmy</p>
                        <input type="text" name="nazwa" class="pole">
                        <p>Adres e-mail</p>
                        <input type="text" name="mail" class="pole">
                        <p>Hasło</p>
                        <input type="password" name="haslo" class="pole">
                        <p>Powtórz hasło</p>
                        <input type="password" name="haslo2" class="pole">
                        <p><input type="submit" value="Zarejestruj się"></p>
                    </form>
                </div>
            </div>
        </section>
<?php include 'footer.php'; ?>