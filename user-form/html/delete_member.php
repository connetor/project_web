<?php
	require'../../class.php';

	$id = $_POST['data_id'];

	$obj = new Dataphp();
	$obj->delete_data($id,"memberinformation","Member_ID");

?>