<?php
	/**
	* 
	*/
	class Dataphp
	{
		private $link;
	
		function __construct()
		{	
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$table = 'project';
			$this->link = mysqli_connect($host,$user,$pass,$table) or die(mysqli_error());
			mysqli_set_charset($this->link,'utf8');
		}

		function insert_memberinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email){
			$sql = "INSERT INTO `memberinformation` (`Username`, `Password`, `Fname`, `Lname`, `Bdate`, `Address`, `Phone`, `Email`) VALUES ('$user','$pass','$fname','$lname','$bdate','$address','$phone','$email')";
			mysqli_query($this->link,$sql);
		}

		function insert_workkerinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email,$type,$ex,$teclo){
			$sql = "INSERT INTO `workerinformation`( `Username`, `Password`, `Fname`, `Lname`, `Bdate`, `Address`, `Phone`, `Email`,`TypeID`, `TechnicLocation`, `Extention`) VALUES ('$user','$pass','$fname','$lname','$bdate','$address','$phone','$email',$type,'$teclo','$ex')";
			mysqli_query($this->link,$sql);
		}
	}
?>