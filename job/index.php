<?php
include_once("../config/database.php");
include_once("../config/CRUD.php");

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {

	case 'hiringForm' :
		$content 	= 'hiringForm.php';
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

	default :
}
require_once $template;

?>