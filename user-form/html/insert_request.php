<?php
	$name = $_POST['name'];
	$location = $_POST['location'];
	$detail = $_POST['detail'];
	$id_w = $_POST['id_worker'];
	$id_m = $_POST['id_member'];

	require'../../class.php';
    $obj = new Dataphp();
    $obj->insert_request($id_w,$id_m,$name,$location,$detail);
?>