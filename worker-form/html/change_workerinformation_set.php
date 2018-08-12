<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$addr = $_POST['addr'];
	$id = $_POST['id'];

	require'../../class.php';
	
	$obj = new Dataphp();
	$obj->change_workerinformation($fname,$lname,$email,$phone,$addr,$id);
?>