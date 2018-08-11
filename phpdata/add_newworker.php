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
	$type = $_POST['type_work'];
	$ex = $_POST['extention'];
	$teclo = $_POST['technicLocation'];

	$obj = new Dataphp();
	$obj->insert_workkerinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email,$type,$ex,$teclo);

?>