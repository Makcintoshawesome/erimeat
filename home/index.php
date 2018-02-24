<?php
include_once("../config/database.php");
include_once("../config/CRUD.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {

	case 'home' :
		$content 	= 'home.php';
		$template	= '../include/template.php';
		break;

	case 'aboutUs' :
		$content 	= 'aboutUs.php';
		$template	= '../include/template.php';
		break;

	case 'contactUs' :
		$content 	= 'contactUs.php';
		$template	= '../include/template.php';
		break;

	case 'services' :
		$content 	= 'services.php';
		$template	= '../include/template.php';
		break;

	case 'hiringForm' :
		$content 	= 'hiringForm.php';
		$template	= '../include/template.php';
		break;

	case 'success' :
		$content 	= 'success.php';
		$template	= '../include/template.php';
		break;

	case 'searchJob' :
		$content 	= 'searchJob.php';
		$template	= '../include/template.php';
		break;

	case 'jobList' :
		$content 	= 'jobList.php';
		$template	= '../include/template.php';
		break;

	case 'jobDetail' :
		$content 	= 'jobDetail.php';
		$template	= '../include/template.php';
		break;

	case 'application' :
		$content 	= 'application.php';
		$template	= '../include/template.php';
		break;

	case 'submitResume' :
		$content 	= 'submitResume.php';
		$template	= '../include/template.php';
		break;

	case 'searchResume' :
		$content 	= 'searchResume.php';
		$template	= '../include/template.php';
		break;

	case 'candidateList' :
		$content 	= 'candidateList.php';
		$template	= '../include/template.php';
		break;

	default :
		$content 	= 'home.php';
		$template	= '../include/template.php';
}

$headScript = 'headScript.php';
$footScript = 'footScript.php';
require_once $template;

?>
