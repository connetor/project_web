<?php
	/**
	* 
	*/
	class Dataphp
	{
		private $link;
		public $memberinformation,$workerinformation;
	
		function __construct()
		{	
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$table = 'project';
			$this->link = mysqli_connect($host,$user,$pass,$table) or die(mysqli_error());
			mysqli_set_charset($this->link,'utf8');
		}

		function insert_memberinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email)
		{
			$sql = "INSERT INTO `memberinformation` (`Username`, `Password`, `Fname`, `Lname`, `Bdate`, `Address`, `Phone`, `Email`) VALUES ('$user','$pass','$fname','$lname','$bdate','$address','$phone','$email')";
			mysqli_query($this->link,$sql);
		}

		function insert_workkerinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email,$type,$ex,$teclo)
		{
			$sql = "INSERT INTO `workerinformation`( `Username`, `Password`, `Fname`, `Lname`, `Bdate`, `Address`, `Phone`, `Email`,`TypeID`, `TechnicLocation`, `Extention`) VALUES ('$user','$pass','$fname','$lname','$bdate','$address','$phone','$email',$type,'$teclo','$ex')";
			mysqli_query($this->link,$sql);
		}

		function memberinformation($id)
		{
			$sql = "SELECT `Fname`, `Lname`,  `Address`, `ProfilePic`, `Phone`, `Email` FROM `memberinformation` WHERE `Member_ID` = ".$id;
			$this->memberinformation = mysqli_query($this->link,$sql);
		}

		function change_memberinformation($fname,$lname,$email,$phone,$addr,$id)
		{
			$sql = "UPDATE `memberinformation` SET";
			if ($fname!=null) {
				$sql .= " `Fname`= '".$fname."'";
				if ($lname!=null) {
					$sql .= " ,`Lname`= '".$lname."'";
				}
				if ($email!=null) {
					$sql .= " ,`Email`= '".$email."'";
				}
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($lname!=null) {
				$sql .= " `Lname`= '".$lname."'";
				if ($email!=null) {
					$sql .= " ,`Email`= '".$email."'";
				}
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($email!=null) {
				$sql .= " `Email`= '".$email."'";
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($phone!=null) {
				$sql .= " `Phone`= '".$phone."'";
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($addr!=null) {
				$sql .= " `Address`= '".$addr."'";
			}
			$sql .= " WHERE `Member_ID` = " .$id;
			mysqli_query($this->link,$sql);
		}

		function workerinformation($id)
		{
			$sql = "SELECT `Fname`, `Lname`,  `Address`, `ProfilePic`, `Phone`, `Email` FROM `workerinformation` WHERE `Worker_ID` = ".$id;
			$this->workerinformation = mysqli_query($this->link,$sql);
		}

		function change_workerinformation($fname,$lname,$email,$phone,$addr,$id)
		{
			$sql = "UPDATE `workerinformation` SET";
			if ($fname!=null) {
				$sql .= " `Fname`= '".$fname."'";
				if ($lname!=null) {
					$sql .= " ,`Lname`= '".$lname."'";
				}
				if ($email!=null) {
					$sql .= " ,`Email`= '".$email."'";
				}
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($lname!=null) {
				$sql .= " `Lname`= '".$lname."'";
				if ($email!=null) {
					$sql .= " ,`Email`= '".$email."'";
				}
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($email!=null) {
				$sql .= " `Email`= '".$email."'";
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($phone!=null) {
				$sql .= " `Phone`= '".$phone."'";
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($addr!=null) {
				$sql .= " `Address`= '".$addr."'";
			}
			$sql .= " WHERE `Worker_ID` = " .$id;

			mysqli_query($this->link,$sql);
		}

		function delete_data($id,$table,$where){
			$sql = "DELETE FROM `".$table."` WHERE `".$where."` = ".$id;
			mysqli_query($this->link,$sql);
		}

		function login($id,$pw){
			session_start();

			$sql = "SELECT `Member_ID` FROM `memberinformation` WHERE `Username` = '".$id."' AND `Password` = '".$pw."'";
			if (mysqli_num_rows(mysqli_query($this->link,$sql)) != 0) {
				$_id =  mysqli_fetch_assoc( mysqli_query($this->link,$sql) );
				$_SESSION['member'] = true;
				$_SESSION['id_show'] = $_id['Member_ID'];
				echo "member";
			}
			$sql2 = "SELECT `Worker_ID` FROM `workerinformation` WHERE `Username` = '".$id."' AND `Password` = '".$pw."'";
			if (mysqli_num_rows(mysqli_query($this->link,$sql2)) != 0) {
				$_id =  mysqli_fetch_assoc( mysqli_query($this->link,$sql2) );
				$_SESSION['worker'] = true;
				$_SESSION['id_show'] = $_id['Worker_ID'];
				echo "worker";
			}

			if (mysqli_num_rows(mysqli_query($this->link,$sql2)) == 0 && mysqli_num_rows(mysqli_query($this->link,$sql)) == 0) {
				$_SESSION['member'] = false;
				$_SESSION['worker'] = false;
				session_destroy();
				echo "error";
			}

		}
	}
?>