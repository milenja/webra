<?php
session_start();
global $mysqli;
$mysqli = @new mysqli("mysql2.mydevil.net", "m12382_avalanche", "wscieKlaowca303", "m12382_webra");
require 'funkcje.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Webra - Panel klienta</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style-panel.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
    <div class="calosc">
        <div class="lewa"></div>
        <div class="prawa">
            <header>
               <div class="akcja">
                    <a href="index.php">Wróć do strony</a> | <a href="panel.php?wyloguj">Wyloguj się</a>
                </div>
                <h1>Panel klienta</h1>
            </header>
            <nav>
                <ul>
                    <li><a href="panel.php">Start</a></li>
                    <li><a href="panel.php?p=dane">Moje dane</a></li>
                    <li><a href="panel.php?p=zamowienia">Moje zamówienia</a></li>
                </ul>
            </nav>
<?php
if(!empty($_SESSION['zamowienie'])) {
    ?>
    <a href="panel.php?p=zamow">Dokończ składanie zamówienia</a>
    <?php
}
if(isset($_GET['p']) && $_GET['p'] == 'zamow') {
    // kończymy proces zamawiania
    $mozliwosci = array(
        'podstawa' => array('nazwa' => 'Podstawa strony WWW', 'koszt' => 499),
        'tresc' => array('nazwa' => 'Treść na stronę', 'koszt' => 199),
        'formularz' => array('nazwa' => 'Formularz kontaktowy', 'koszt' => 149),
        'galeria' => array('nazwa' => 'Przygotowanie szablonu galerii', 'koszt' => 199),
        'projekt' => array('nazwa' => 'Wykonanie projektu strony', 'koszt' => 499),
        'rwd' => array('nazwa' => 'Responsywny szablon strony', 'koszt' => 249),
        'slider' => array('nazwa' => 'Slider', 'koszt' => 149),
        'statystyki' => array('nazwa' => 'Statystyki', 'koszt' => 149)
    );
    $zamowienie = explode(';', $_SESSION['zamowienie'][0]);
    $uwagi = $_SESSION['zamowienie'][1];
    $ile = count($zamowienie);
    $suma = 0;
    ?>
    <h2>Potwierdzenie zamówienia</h2>
    <p>Oto szczegóły złożonego przez Ciebie zamówienia:</p>
    <ul>
    <?php
    for($i=0;$i<$ile;$i++) {
        echo '<li>'.$mozliwosci[$zamowienie[$i]][nazwa].' ('.$mozliwosci[$zamowienie[$i]][koszt].'zł)</li>';
        $suma += $mozliwosci[$zamowienie[$i]][koszt];
    }
    $_SESSION['koszt'] = $suma;
    ?>
    </ul>
    <p>Całkowity koszt zamówienia: <?php echo $suma; ?>zł</p>
    <p><?php echo $uwagi; ?></p>
    // akceptacja regulaminu
    <a href="zamow.php">Popraw zamówienie</a> | <a href="panel.php?p=zatwierdz">Potwierdź zamówienie</a>
    <?php
} elseif(isset($_GET['p']) && $_GET['p'] == 'zatwierdz') {
    zamow();
    ?>
    <h2>Zamówienie zostało złożone</h2>
    <a href="panel.php">Wróć do strony głównej panelu</a>
    <?php
} elseif(isset($_GET['p']) && $_GET['p'] == 'dane') {
    // wyświetlamy dane + edycję
    ?>
    <h2>Twoje dane</h2>
    <?php
    foreach(dane() as $d) {
        if($d != '') {
            ?>
            <table class="pion">
                <tr>
                    <th>ID klienta</th>
                    <td><?php echo $d['id']; ?></td>
                </tr>
                <tr>
                    <th>Adres e-mail</th>
                    <td><?php echo $d['mail']; ?></td>
                </tr>
                <tr>
                    <th>Imię i nazwisko<br>LUB nazwa firmy</th>
                    <td><?php echo $d['nazwa']; ?></td>
                </tr>
                <tr>
                    <th>Numer telefonu</th>
                    <td><?php echo $d['numer_tel']; ?></td>
                </tr>
                <tr>
                    <th>Ulica</th>
                    <td><?php echo $d['ulica']; ?></td>
                </tr>
                <tr>
                    <th>Kod pocztowy</th>
                    <td><?php echo $d['kod_pocztowy']; ?></td>
                </tr>
                <tr>
                    <th>Miejscowość</th>
                    <td><?php echo $d['miejscowosc']; ?></td>
                </tr>
            </table>
            <?php
        }
    }
} elseif(isset($_GET['p']) && $_GET['p'] == 'zamowienia') {
    // wyświetlamy zamówienia
    ?>
    <h2>Twoje zamówienia</h2>
    <table class="poz">
    <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Koszt</th>
    </tr>
    <?php
    foreach(zamowienia() as $z) {
        if($z != '') {
            ?>
            <tr>
                <td><?php echo $z['id']; ?></td>
                <td><?php echo $z['status']; ?></td>
                <td><?php echo $z['koszt']; ?></td>
            </tr>
            <?php
        }
    }
    ?>
    </table>
    <?php
} elseif(isset($_GET['wyloguj'])) {
    wyloguj();
} else {
    // wyświetlamy omówienie konta
    ?>
    <h2>Twoje konto</h2>
    <?php
}
?>
        </div>
    </div>
    <script>
    var body = document.body, html = document.documentElement;

    var height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
    $('.lewa').height(height);
    </script>
</body>
</html