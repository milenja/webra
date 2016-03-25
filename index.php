<?php
/**
 * Przygotowujemy odpowiednią część adresu URL do wyznaczenia routingu.
 */
$requested = empty($_SERVER['REQUEST_URI']) ? false : $_SERVER['REQUEST_URI'];
if(substr($requested, -1) == '/') {
    $requested = substr($requested, 0, -1);
}
$requested = strtok($requested, '?');

$whichModule = explode('/', $requested);
if($whichModule[1] == 'panel') {
    include 'headerPanel.php';
} else {
    include 'header.php';
}

/**
 * Poniżej znadują się wszystkie podstrony, które obsługujemy.
 * Jeżeli URL wskazuje na coś, czego nie obslugujemy, to wyświetlamy błąd 404.
 */
switch ( $requested ) {
	case '':
    case '/index':
		include 'main.php';
		break;
	case '/index/zamow':
		include 'zamow.php';
		break;
	case '/index/jakpracuje':
		include 'jakpracuje.php';
		break;
	case '/index/kontakt':
		include 'kontakt.php';
		break;
	case '/index/oferta':
		include 'oferta.php';
		break;
	case '/index/onas':
		include 'onas.php';
		break;
	case '/index/portfolio':
		include 'portfolio.php';
		break;
	case '/index/zaloguj':
		include 'zaloguj.php';
		break;
	case '/index/zarejestruj':
		include 'zarejestruj.php';
		break;
    case '/index/regulamin':
		include 'regulamin.php';
		break;
    case '/index/wyloguj':
		include 'wyloguj.php';
		break;
    case '/panel':
		include 'kontoPanel.php';
		break;
	case '/panel/zamow':
		include 'zamowPanel.php';
		break;
	case '/panel/zatwierdz':
		include 'zatwierdzPanel.php';
		break;
	case '/panel/dane':
		include 'danePanel.php';
		break;
	case '/panel/zamowienia':
		include 'zamowieniaPanel.php';
		break;
    case '/panel/edytuj-dane':
		include 'edytujDanePanel.php';
		break;
    case '/panel/zapisz-dane':
		include 'zapiszDanePanel.php';
		break;
	default :
		include '404.php';
}

if($whichModule[1] == 'panel') {
    include 'footerPanel.php';
} else {
    include 'footer.php';
}
?>