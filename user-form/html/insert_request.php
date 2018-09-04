<?php
	$name = $_POST['name'];
	$location = $_POST['location'];
	$detail = $_POST['detail'];
	$id_w = $_POST['id_worker'];
	$id_m = $_POST['id_member'];
	$promo = $_POST['promotion'];

	if($name==NULL&&$location==NULL&&$detail==NULL&&$id_w==NULL&&$id_m==NULL&&$promo==NULL){
		echo "error1";
	}

	require'../../class.php';
    $obj = new Dataphp();

    if($obj->checkpro($promo)==1){
    	echo "promotion True";
    	$obj->insert_request2($id_w,$id_m,$name,$location,$detail,$promo);
    }
   	else if($obj->checkpro($promo)==0){
   		echo "promotion False";
   		$obj->insert_request($id_w,$id_m,$name,$location,$detail);
   	}
?>