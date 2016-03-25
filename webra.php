<?php

/**
 * @author wlokietek
 */
class Webra {

	protected $db;

	public function __construct() {
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public function zarejestruj() {
		$mail = $_POST['mail'];
		$haslo = $_POST['haslo'];
		$haslo2 = $_POST['haslo2'];
		$nazwa = $_POST['nazwa'];
		$data_rej = date('Y-m-d H:i:s');
		$rola = 'user';
		if ($haslo == $haslo2) {
			$wynik = $this->db->query("INSERT INTO klienci (mail, haslo, nazwa, data_rej, rola) VALUES ('$mail', '$haslo', '$nazwa', '$data_rej', '$rola')");
			$_SESSION['msg'] = 'Możesz się terez zalogować';
			header("Location: /index/zaloguj");
            exit;
		} else {
			$_SESSION['msg'] = 'Hasła się różnią';
			header("Location: /index/zarejestruj");
            exit;
		}
	}

	public function zaloguj() {
		$mail = $_POST['mail'];
		$haslo = $_POST['haslo'];
        $wynik = $this->db->query("SELECT * FROM klienci WHERE mail = '$mail'");
        while ($w = $wynik->fetch_assoc()) {
            $haslo_baza = $w['haslo'];
            if ($haslo == $haslo_baza) {
                $_SESSION['zalogowano'] = 1;
                $_SESSION['id_klienta'] = $w['id'];
                header("Location: /panel");
                exit;
            } else {
                $_SESSION['msg'] = 'Złe dane';
                header("Location: /index/zaloguj");
                exit;
            }
        }
	}

	public function zalogowany() {
		if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == 1) {
			return true;
		} else {
			return false;
		}
	}
    
    public function wymusLogowanie() {
        if(!$this->zalogowany()) {
            header("Location: /index/zaloguj");
            exit;
        }
    }

	public function wyloguj() {
		session_destroy();
		header("Location: /index/zaloguj");
        exit;
	}

	function zamow() {
		$id_klienta = $_SESSION['id_klienta'];
		$zawartosc = $_SESSION['zamowienie'][0];
		$uwagi = $_SESSION['zamowienie'][1];
		$status = 'Złożone';
		$data_zlozenia = date('Y-m-d H:i:s');
		$koszt = $_SESSION['koszt'];
		$wynik = $this->db->query("INSERT INTO zamowienia (id_klienta, zawartosc, uwagi, status, data_zlozenia, koszt) VALUES ('$id_klienta', '$zawartosc', '$uwagi', '$status', '$data_zlozenia', '$koszt')");
		$_SESSION['zamowienie'] = null;
		$_SESSION['koszt'] = null;
	}

	public function zamowienia() {
		$id_klienta = $_SESSION['id_klienta'];
		$wynik = $this->db->query("SELECT * FROM zamowienia WHERE id_klienta = '$id_klienta'");
		while ($w = $wynik->fetch_assoc()) {
			$out[] = $w;
		}
		if (empty($out)) {
			$out[] = '';
		}
		return $out;
	}

	public function dane() {
		$id_klienta = $_SESSION['id_klienta'];
		$wynik = $this->db->query("SELECT * FROM klienci WHERE id = '$id_klienta'");
		while ($w = $wynik->fetch_assoc()) {
			$out[] = $w;
		}
		if (empty($out)) {
			$out[] = '';
		}
		return $out;
	}
    
    public function zapiszDane() {
        $id = $_POST['id'];
		$mail = $_POST['mail'];
		$numer_tel = $_POST['numer_tel'];
		$ulica = $_POST['ulica'];
		$nazwa = $_POST['nazwa'];
        $miejscowosc = $_POST['miejscowosc'];
		$kod_pocztowy = $_POST['kod_pocztowy'];
        $wynik = $this->db->query("UPDATE klienci SET mail = '$mail', nazwa = '$nazwa', numer_tel = '$numer_tel', ulica = '$ulica', kod_pocztowy = '$kod_pocztowy', miejscowosc = '$miejscowosc' WHERE id = '$id'");
        $_SESSION['msg'] = 'Dane zostały zapisane';
        header("Location: /panel/dane");
        exit;
	}

	public function zlozZamowienie() {
		$zamowienie = implode(';', $_POST['zamowienie']);
		$uwagi = 'Uwagi: ' . $_POST['uwagi'];
		$_SESSION['zamowienie'] = array($zamowienie, $uwagi);
		if ($this->zalogowany()) {
			header("Location: /panel/zamow");
            exit;
		} else {
			header("Location: /index/zaloguj");
            exit;
		}
	}

	public function rozbijDane() {
		if (isset($_SESSION['zamowienie']) && $_SESSION['zamowienie'] !== null) {
			$zam = explode(';', $_SESSION['zamowienie'][0]);
			$uwa = $_SESSION['zamowienie'][1];
		} else {
			$zam = array();
			$uwa = '';
		}
		
		return array($zam, $uwa);
	}

}