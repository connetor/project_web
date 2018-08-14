<?php
	session_start();
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$addr = $_POST['addr'];

	$id = $_SESSION['id_show'];

	require'../../class.php';

	$obj = new Dataphp();
	$obj->change_memberinformation($fname,$lname,$email,$phone,$addr,$id);
?>