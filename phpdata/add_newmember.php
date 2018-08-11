<?php
	require'../class.php';
	$user = $_POST['form_id'];
	$pass = $_POST['form_pw'];
	$fname = $_POST['form_fname'];
	$lname = $_POST['form_lname'];
	$bdate = $_POST['bday'];
	$address = $_POST['addr'];
	$phone = $_POST['form_tel'];
	$email = $_POST['form_email'];

	$obj = new Dataphp();
	$obj->insert_memberinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email);

?>