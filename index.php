<?php include 'header.php'; ?>

<?php

switch ($_GET['p']) {
	case '':
		include 'main.php';
		break;
	case 'zamow':
		include 'zamow.php';
		break;
	case 'jakpracuje':
		include 'jakpracuje.php';
		break;
	case 'kontakt':
		include 'kontakt.php';
		break;
	case 'oferta':
		include 'oferta.php';
		break;
	case 'onas':
		include 'onas.php';
		break;
	case 'portfolio':
		include 'portfolio.php';
		break;
	case 'zaloguj':
		include 'zaloguj.php';
		break;
	case 'zarejestruj':
		include 'zarejestruj.php';
		break;
	default :
		include '404.php';
}
?>

<?php include 'footer.php'; ?>