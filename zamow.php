<?php include 'header.php'; ?>
        <section class="content">
            <h2>Złóż <span class="wyr">zamówienie</span></h2>
            <div class="main">
                <h3>Złóz zamówienie na wymarzoną stronę WWW</h3>
                <p>W tym miejscu możesz wybrać wszystko, z czego powinna składać się Twoja strona.</p>
<?php
if(isset($_SESSION['zamowienie']) && $_SESSION['zamowienie'] !== null) {
    $zam = explode(';', $_SESSION['zamowienie'][0]);
    $uwa = $_SESSION['zamowienie'][1];
} else {
    $zam = array();
    $uwa = '';
}
?>
                <form action="?zamow" method="post">
                    <table id="zamow">
                        <tr>
                            <th class="th-left">Element</th>
                            <th class="th-left">Opis</th>
                            <th class="th-right">Koszt</th>
                        </tr>
                        <tr>
                            <td>
                                <img src="ikonki/szablon.png" alt="" class="img-zamow">
                            </td>
                            <td>
                                <input type="checkbox" name="zamowienie[]" value="podstawa" id="podstawa" class="ch" <?php if(in_array('podstawa', $zam)) { echo 'checked'; } ?>>
                                <label for="podstawa">Podstawa strony WWW</label>
                            </td>
                            <td class="k">499</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="ikonki/content.png" alt="" class="img-zamow">
                            </td>
                            <td>
                                <input type="checkbox" name="zamowienie[]" value="tresc" id="tresc" class="ch" <?php if(in_array('tresc', $zam)) { echo 'checked'; } ?>>
                                <label for="tresc">Treść na stronę</label>
                            </td>
                            <td class="k">199</td>
                        </tr>
                        <tr>

                            <td>
                                <img src="ikonki/formularz.png" alt="" class="img-zamow">
                            </td>
                            <td>
                                <input type="checkbox" name="zamowienie[]" value="formularz" id="form" class="ch" <?php if(in_array('formularz', $zam)) { echo 'checked'; } ?>>
                                <label for="form">Formularz kontaktowy</label>
                            </td>
                            <td class="k">149</td>

                        </tr>
                        <tr>

                            <td>
                                <img src="ikonki/galeria.png" alt="" class="img-zamow">
                            </td>
                            <td>
                                <input type="checkbox" name="zamowienie[]" value="galeria" id="gal" class="ch" <?php if(in_array('galeria', $zam)) { echo 'checked'; } ?>>
                                <label for="gal">Przygotowanie szablonu galerii</label>
                            </td>
                            <td class="k">199</td>

                        </tr>
                        <tr>

                            <td>
                                <img src="ikonki/projekt.png" alt="" class="img-zamow">
                            </td>
                            <td>
                                <input type="checkbox" name="zamowienie[]" value="projekt" id="projekt" class="ch" <?php if(in_array('projekt', $zam)) { echo 'checked'; } ?>>
                                <label for="projekt">Wykonanie projektu strony</label>
                            </td>
                            <td class="k">499</td>

                        </tr>
                        <tr>

                            <td>
                                <img src="ikonki/rwd.png" alt="" class="img-zamow">
                            </td>
                            <td>
                                <input type="checkbox" name="zamowienie[]" value="rwd" id="rwd" class="ch" <?php if(in_array('rwd', $zam)) { echo 'checked'; } ?>>
                                <label for="rwd">Responsywny szablon strony</label>
                            </td>
                            <td class="k">249</td>

                        </tr>
                        <tr>

                            <td>
                                <img src="ikonki/slider.png" alt="" class="img-zamow">
                            </td>
                            <td>
                                <input type="checkbox" name="zamowienie[]" value="slider" id="slider" class="ch" <?php if(in_array('slider', $zam)) { echo 'checked'; } ?>>
                                <label for="slider">Slider</label>
                            </td>
                            <td class="k">149</td>

                        </tr>
                        <tr>

                            <td>
                                <img src="ikonki/statystyki.png" alt="" class="img-zamow">
                            </td>
                            <td>
                                <input type="checkbox" name="zamowienie[]" value="statystyki" id="stat" class="ch" <?php if(in_array('statystyki', $zam)) { echo 'checked'; } ?>>
                                <label for="stat">Statystyki</label>
                            </td>
                            <td class="k">149</td>

                        </tr>
                        
                        <tr>

                            <td colspan="3">
                                <h3>Tu wpisz swoje uwagi dotyczące zamówienia</h3>
                                <textarea name="uwagi" class="pole"><?php echo substr($uwa, 7); ?></textarea>
                            </td>

                        </tr>
                    </table>
                    <p>
                        <input type="submit" value="Następny krok &rarr;">
                    </p>
                </form>
                <div id="suma"></div>
            </div>
        </section>
<?php include 'footer.php'; ?>