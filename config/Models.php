<?php
include "CRUD.php";

// User Models
function admin() {
	$crud = new CRUD;
	$crud->table = "admin";
	return $crud;
}

// User Models
function company() {
	$crud = new CRUD;
	$crud->table = "company";
	return $crud;
}

// User Models
function dtr() {
	$crud = new CRUD;
	$crud->table = "dtr";
	return $crud;
}

// User Models
function employee() {
	$crud = new CRUD;
	$crud->table = "employee";
	return $crud;
}

// User Models
function hr() {
	$crud = new CRUD;
	$crud->table = "hr";
	return $crud;
}

// User Models
function inqueries() {
	$crud = new CRUD;
	$crud->table = "inqueries";
	return $crud;
}

// User Models
function interview_date() {
	$crud = new CRUD;
	$crud->table = "interview_date";
	return $crud;
}
// User Models
function job() {
	$crud = new CRUD;
	$crud->table = "job";
	return $crud;
}

// User Models
function job_function() {
	$crud = new CRUD;
	$crud->table = "job_function";
	return $crud;
}

// User Models
function position_type() {
	$crud = new CRUD;
	$crud->table = "position_type";
	return $crud;
}

// User Models
function resume() {
	$crud = new CRUD;
	$crud->table = "resume";
	return $crud;
}
// User Models
function timesheet() {
	$crud = new CRUD;
	$crud->table = "timesheet";
	return $crud;
}

// User Models
function user() {
	$crud = new CRUD;
	$crud->table = "user";
	return $crud;
}
?>
