<?php
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
						for ($i = 0; $i < $ile; $i++) {
							echo '<li>' . $mozliwosci[$zamowienie[$i]][nazwa] . ' (' . $mozliwosci[$zamowienie[$i]][koszt] . 'zł)</li>';
							$suma += $mozliwosci[$zamowienie[$i]][koszt];
						}
						$_SESSION['koszt'] = $suma;
						?>
    </ul>
    <p>Całkowity koszt zamówienia:
        <?php echo $suma; ?>zł</p>
    <p>
        <?php echo $uwagi; ?>
    </p>
    <p>
        <input type="checkbox" name="regulamin" id="akceptacjaRegulaminu"> Akceptuję <a href="/index/regulamin">regulamin</a> (<a href="/dokumenty/Regulamin_strony_internetowej.pdf">pobierz PDF</a>)</p>
    <a href="/index/zamow">Popraw zamówienie</a> | <a id="zatwierdzZamowienie" href="/panel/zatwierdz">Potwierdź zamówienie</a>
    <div id="regulaminInfo" style="display: none;"></div>