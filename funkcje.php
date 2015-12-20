<?php
function zarejestruj()
{
    global $mysqli;
    $mail = $_POST['mail'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];
    $nazwa = $_POST['nazwa'];
    $data_rej = date('Y-m-d H:i:s');
    if($haslo == $haslo2) {
        $wynik = $mysqli->query("INSERT INTO klienci (mail, haslo, nazwa, data_rej) VALUES ('$mail', '$haslo', '$nazwa', '$data_rej')");
        $_SESSION['msg'] = 'Możesz się terez zalogować';
        header("Location: zaloguj.php");
    } else {
        $_SESSION['msg'] = 'Hasła się różnią';
        header("Location: zarejestruj.php");
    }
    
}

function zaloguj()
{
    global $mysqli;
    $mail = $_POST['mail'];
    $haslo = $_POST['haslo'];
    if($mail == 'webra') {
        if($haslo == 'Webra123') {
            $_SESSION['zalogowano'] = 1;
            $_SESSION['id_klienta'] = 0;
            $_SESSION['admin'] = 1;
            header("Location: panel.php");
        } else {
            $_SESSION['msg'] = 'Złe dane';
            header("Location: zaloguj.php");
        }
    } else {
        $wynik = $mysqli->query("SELECT * FROM klienci WHERE mail = '$mail'");
        while($w = $wynik->fetch_assoc()) {
            $haslo_baza = $w['haslo'];
            if($haslo == $haslo_baza) {
                $_SESSION['zalogowano'] = 1;
                $_SESSION['id_klienta'] = $w['id'];
                header("Location: panel.php");
            } else {
                $_SESSION['msg'] = 'Złe dane';
                header("Location: zaloguj.php");
            }
        }
    }
}

function zalogowany()
{
    if(isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == 1) {
        return true;
    } else {
        return false;
    }
}

function wyloguj()
{
    session_destroy();
    header("Location: zaloguj.php");
}

function zamow()
{
    global $mysqli;
    $id_klienta = $_SESSION['id_klienta'];
    $zawartosc = $_SESSION['zamowienie'][0];
    $uwagi = $_SESSION['zamowienie'][1];
    $status = 'Złożone';
    $data_zlozenia = date('Y-m-d H:i:s');
    $koszt = $_SESSION['koszt'];
    $wynik = $mysqli->query("INSERT INTO zamowienia (id_klienta, zawartosc, uwagi, status, data_zlozenia, koszt) VALUES ('$id_klienta', '$zawartosc', '$uwagi', '$status', '$data_zlozenia', '$koszt')");
    $_SESSION['zamowienie'] = null;
    $_SESSION['koszt'] = null;
}

function zamowienia()
{
    global $mysqli;
    $id_klienta = $_SESSION['id_klienta'];
    $wynik = $mysqli->query("SELECT * FROM zamowienia WHERE id_klienta = '$id_klienta'");
    while($w = $wynik->fetch_assoc()) {
        $out[] = $w;
    }
    if(empty($out)) {
        $out[] = '';
    }
    return $out;
}

function dane()
{
    global $mysqli;
    $id_klienta = $_SESSION['id_klienta'];
    $wynik = $mysqli->query("SELECT * FROM klienci WHERE id = '$id_klienta'");
    while($w = $wynik->fetch_assoc()) {
        $out[] = $w;
    }
    if(empty($out)) {
        $out[] = '';
    }
    return $out;
}