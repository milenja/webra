<?php include 'header.php'; ?>
        <section class="content">
            <h2><span class="wyr">Zaloguj</span> się</h2>
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
                    <form action="zaloguj.php?zaloguj" method="post">
                        <p>Adres e-mail</p>
                        <input type="text" name="mail" class="pole">
                        <p>Hasło</p>
                        <input type="password" name="haslo" class="pole">
                        <p><input type="submit" value="Zaloguj się"></p>
                        <p>Nie masz jeszcze konta? <a href="zarejestruj.php">Zarejestruj się</a></p>
                    </form>
                </div>
            </div>
        </section>
<?php include 'footer.php'; ?>