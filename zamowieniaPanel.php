<h2>Twoje zamówienia</h2>
<table class="poz">
    <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Koszt</th>
    </tr>
    <?php
						foreach ($webra->zamowienia() as $z) {
							if ($z != '') {
								?>
        <tr>
            <td>
                <?php echo $z['id']; ?>
            </td>
            <td>
                <?php echo $z['status']; ?>
            </td>
            <td class="koszt">
                <?php echo $z['koszt']; ?> zł
            </td>
        </tr>
        <?php
							}
						}
						?>
</table>