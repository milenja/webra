    <h2>Twoje dane</h2>
    <p><a href="/panel/edytuj-dane">Edytuj dane</a></p>
    <?php
					foreach ($webra->dane() as $d) {
						if ($d != '') {
							?>
        <table class="pion">
            <tr>
                <th>ID klienta</th>
                <td>
                    <?php echo $d['id']; ?>
                </td>
            </tr>
            <tr>
                <th>Adres e-mail</th>
                <td>
                    <?php echo $d['mail']; ?>
                </td>
            </tr>
            <tr>
                <th>Imię i nazwisko
                    <br>LUB nazwa firmy</th>
                <td>
                    <?php echo $d['nazwa']; ?>
                </td>
            </tr>
            <tr>
                <th>Numer telefonu</th>
                <td>
                    <?php echo $d['numer_tel']; ?>
                </td>
            </tr>
            <tr>
                <th>Ulica i numer</th>
                <td>
                    <?php echo $d['ulica']; ?>
                </td>
            </tr>
            <tr>
                <th>Kod pocztowy</th>
                <td>
                    <?php echo $d['kod_pocztowy']; ?>
                </td>
            </tr>
            <tr>
                <th>Miejscowość</th>
                <td>
                    <?php echo $d['miejscowosc']; ?>
                </td>
            </tr>
        </table>
        <?php
						}
					}