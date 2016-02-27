<?php
if (isset($_SESSION['msg']) && $_SESSION['msg'] !== NULL) {
	?>
	<div class="msg">
		<?php
		echo $_SESSION['msg'];
		$_SESSION['msg'] = NULL;
		?>
	</div>
	<?php
}