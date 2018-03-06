<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'login' :
		login();
		break;

	case 'submitTimesheet' :
		submitTimesheet();
		break;

	case 'newCheckIn' :
		newCheckIn();
		break;

	case 'logout' :
		logout();
		break;

	case 'changepassword' :
		changepassword();
		break;

	case 'stampBreak' :
		stampBreak();
		break;

	case 'stampBreak2' :
		stampBreak2();
		break;

	case 'stampLunch' :
		stampLunch();
		break;

	case 'stampCheckIn' :
		stampCheckIn();
		break;

	case 'stampCheckOut' :
		stampCheckOut();
		break;

	default :
}

function login()
{
	// if we found an error save the error message in this variable

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = user()->get("username='$username' and password = '$password'");

	if ($result){
		$_SESSION['employee_session'] = $username;
		if ($password == 'temppassword'){
			header('Location: index.php?view=changepassword');
		}
		else{

			//TODO: Ano ni?!?!
		//$conn = new PDO('mysql:host=localhost; dbname=db_erimeat','root', '');

		$dateNow = date("Y-m-d");
		$checkDtr = dtr()->get("owner='$username' and createDate='$dateNow'");
		if (!$checkDtr){
				newCheckIn();
			}

				header('Location: index.php');
		}
	}
	else {
			header('Location: index.php?error=User not found in the Database');
	}
}

function newCheckIn()
{

	$dtr = dtr();
	$dtr->obj['owner'] = $_SESSION['employee_session'];
	$dtr->obj['createDate'] = "NOW()";
	$dtr->obj['checkIn'] = "NOW()";
	$dtr->create();
}

function changepassword()
{
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if($password == $password2){
		if($password != 'temppassword'){
			$obj = new Profile;
			$newObj = $obj->readOne($_POST['username']);
			$newObj->password = $password;
			$obj->updateOne($newObj);

			header('Location: index.php');
		}
		else{
			header('Location: index.php?view=changepassword&error=Invalid Password');
		}
	}
	else{
		header('Location: index.php?view=changepassword&error=Password not matched');
	}
}

function stampCheckIn(){

		$obj = new DTR;
		$dtr = $obj->readOne($_SESSION['employee_session'], date("Y-m-d"));

	if ($dtr->status == 1)
	{
		__breakIn();
	}

	if ($dtr->status == 2)
	{
		__breakIn2();
	}

	if ($dtr->status == 3)
	{
		__lunchIn();
	}

}

function __breakIn(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");
	$db = Database::connect();
	$pdo = $db->prepare("update dtr set breakIn=NOW(),
															status = '0'
															where owner='$currentUser'
															and createDate='$currentDate'
															");
	$pdo->execute();
	Database::disconnect();

	header('Location: index.php');
}

function __breakIn2(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");
	$db = Database::connect();
	$pdo = $db->prepare("update dtr set breakIn2=NOW(),
															status = '0'
															where owner='$currentUser'
															and createDate='$currentDate'
															");
	$pdo->execute();
	Database::disconnect();

	header('Location: index.php');
}

function __lunchIn(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");
	$db = Database::connect();
	$pdo = $db->prepare("update dtr set lunchIn=NOW(),
															status = '0'
															where owner='$currentUser'
															and createDate='$currentDate'
															");
	$pdo->execute();
	Database::disconnect();

	header('Location: index.php');
}

function stampBreak(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");
	$db = Database::connect();
	$pdo = $db->prepare("update dtr set breakOut=NOW(),
															status = '1'
															where owner='$currentUser'
															and createDate='$currentDate'
															");
	$pdo->execute();
	Database::disconnect();

	header('Location: index.php');
}

function stampBreak2(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");
	$db = Database::connect();
	$pdo = $db->prepare("update dtr set breakOut2=NOW(),
															status = '2'
															where owner='$currentUser'
															and createDate='$currentDate'
															");
	$pdo->execute();
	Database::disconnect();

	header('Location: index.php');
}


function stampLunch(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");
	$db = Database::connect();
	$pdo = $db->prepare("update dtr set lunchOut=NOW(),
															status = '3'
															where owner='$currentUser'
															and createDate='$currentDate'
															");
	$pdo->execute();
	Database::disconnect();

	header('Location: index.php');
}


function stampCheckOut(){

	$currentUser = $_SESSION['employee_session'];
	$currentDate = date("Y-m-d");
	$db = Database::connect();
	$pdo = $db->prepare("update dtr set checkOut=NOW(),
															status = '4'
															where owner='$currentUser'
															and createDate='$currentDate'
															");
	$pdo->execute();
	Database::disconnect();

	header('Location: index.php');
}


function submitTimesheet()
{
	$currentUser = $_SESSION['employee_session'];
	// Get jobId
	$emp = new Employee;
	$newEmp = $emp->readOne($currentUser);

	// Create timesheetId
	$ts = new Timesheet;
	$ts->jobId = $newEmp->jobId;
	$ts->employee = $currentUser;
	$ts->name = 'Timesheet as of ' . date("Y-m-d H:i:s");
	$ts->createOne($ts);

	// Get latest timesheet Id
	$db = Database::connect();
	$pdo = $db->prepare("select * from timesheet where employee='$currentUser' ORDER BY ID DESC LIMIT 1");
	$pdo->execute();
	$timesheetData = $pdo->fetch(PDO::FETCH_OBJ);

	$pdo = $db->prepare("update dtr set timesheetId = '$timesheetData->Id'
													where timesheetId = '0' and owner = '$currentUser'
															");
	$pdo->execute();
	Database::disconnect();

	// Update all dtr
	header('Location: index.php?a='.$ts->Id);

// $obj = new DTR;
// foreach($obj->readList($user) as $row) {
// 	if ($row->status==4 && !$row->timesheetId){
//
// 	}

}

function logout()

{
	//logout.php
session_start();
session_destroy();
header('Location: ../home/?view=logins');
	exit;
}

?>
