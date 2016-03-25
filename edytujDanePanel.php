    <h2>Twoje dane</h2>
    <p><a href="/panel/edytuj-dane">Edytuj dane</a></p>
    <?php
					foreach ($webra->dane() as $d) {
						if ($d != '') {
							?>
							<form action="/panel/zapisz-dane" method="post">
        <table class="pion">
            <tr>
                <th>Adres e-mail</th>
                <td>
                    <input type="text" name="mail" value="<?php echo $d['mail']; ?>">
                </td>
            </tr>
            <tr>
                <th>Imię i nazwisko
                    <br>LUB nazwa firmy</th>
                <td>
                    <input type="text" name="nazwa" value="<?php echo $d['nazwa']; ?>">
                </td>
            </tr>
            <tr>
                <th>Numer telefonu</th>
                <td>
                    <input type="text" name="numer_tel" value="<?php echo $d['numer_tel']; ?>" placeholder="555 345 678">
                </td>
            </tr>
            <tr>
                <th>Ulica i numer</th>
                <td>
                    <input type="text" name="ulica" value="<?php echo $d['ulica']; ?>" placeholder="ul. Długa 16 m. 4">
                </td>
            </tr>
            <tr>
                <th>Kod pocztowy</th>
                <td>
                    <input type="text" name="kod_pocztowy" value="<?php echo $d['kod_pocztowy']; ?>" placeholder="00-666">
                </td>
            </tr>
            <tr>
                <th>Miejscowość</th>
                <td>
                    <input type="text" name="miejscowosc" value="<?php echo $d['miejscowosc']; ?>"  placeholder="Wrszawa">
                </td>
            </tr>
            <tr>
                <th>Zapisz</th>
                <td>
                       <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="submit" value="Zapisz">
                </td>
            </tr>
        </table>
        </form>
        <?php
						}
					}