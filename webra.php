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
		global $mysqli;
		$mail = $_POST['mail'];
		$haslo = $_POST['haslo'];
		$haslo2 = $_POST['haslo2'];
		$nazwa = $_POST['nazwa'];
		$data_rej = date('Y-m-d H:i:s');
		if ($haslo == $haslo2) {
			$wynik = $this->db->query("INSERT INTO klienci (mail, haslo, nazwa, data_rej) VALUES ('$mail', '$haslo', '$nazwa', '$data_rej')");
			$_SESSION['msg'] = 'Możesz się terez zalogować';
			header("Location: /index/zaloguj");
		} else {
			$_SESSION['msg'] = 'Hasła się różnią';
			header("Location: /index/zarejestruj");
		}
	}

	public function zaloguj() {
		$mail = $_POST['mail'];
		$haslo = $_POST['haslo'];
		if ($mail == 'webra') {
			if ($haslo == 'Webra123') {
				$_SESSION['zalogowano'] = 1;
				$_SESSION['id_klienta'] = 0;
				$_SESSION['admin'] = 1;
				header("Location: /panel");
			} else {
				$_SESSION['msg'] = 'Złe dane';
				header("Location: /index/zaloguj");
			}
		} else {
			$wynik = $this->db->query("SELECT * FROM klienci WHERE mail = '$mail'");
			while ($w = $wynik->fetch_assoc()) {
				$haslo_baza = $w['haslo'];
				if ($haslo == $haslo_baza) {
					$_SESSION['zalogowano'] = 1;
					$_SESSION['id_klienta'] = $w['id'];
					header("Location: /panel");
				} else {
					$_SESSION['msg'] = 'Złe dane';
					header("Location: /index/zaloguj");
				}
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

	public function wyloguj() {
		session_destroy();
		header("Location: /index/zaloguj");
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
		global $mysqli;
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
		global $mysqli;
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

	public function zlozZamowienie() {
		$zamowienie = implode(';', $_POST['zamowienie']);
		$uwagi = 'Uwagi: ' . $_POST['uwagi'];
		$_SESSION['zamowienie'] = array($zamowienie, $uwagi);
		if ($this->zalogowany()) {
			header("Location: /panel/zamow");
		} else {
			header("Location: /index/zaloguj");
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
