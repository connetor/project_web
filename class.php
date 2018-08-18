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

		function re_login(){
			return $this->link;
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
			$sql = "SELECT `Fname`, `Lname`,  `Address`, `Extention`, `Phone`, `Email`, `IsConfirm` FROM `workerinformation` WHERE `Worker_ID` = ".$id;
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
		function review($id){
			$sql = 'SELECT `Worker_ID` FROM `workerinformation` WHERE `TypeID` = '.$id.' ORDER BY RAND() LIMIT 1';
			return mysqli_fetch_assoc(mysqli_query($this->link,$sql));
		}
		function avg_star($id){
			$sql = 'SELECT AVG(Star) FROM `starpoint` WHERE `Worker_ID` = '.$id;
			$resutl = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $resutl['AVG(Star)'];
		}
		function type_select($idtype){
			$sql = 'SELECT `TypeName` FROM `type` WHERE `Type_ID` = '.$idtype;
			$resutl = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $resutl['TypeName'];
		}

		function IsConfirm($id){
			$sql = 'UPDATE `workerinformation` SET `IsConfirm`= 1 WHERE `Worker_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}

		function UnIsConfirm($id){
			$sql = 'UPDATE `workerinformation` SET `IsConfirm`= 0 WHERE `Worker_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
		function insert_request($id_worker,$id_member,$name,$location,$detail){
			$sql = 'INSERT INTO `request`(`Member_ID`, `Worker_ID`, `Location`, `JobName`, `RequestDetail`, `IsConfirmRequest`) VALUES ('.$id_member.','.$id_worker.',"'.$location.'","'.$name.'","'.$detail.'",NULL)';
			mysqli_query($this->link,$sql);
		}
		function return_nameworker($id){
			$sql = 'SELECT  `Fname`, `Lname` FROM `workerinformation` WHERE `Worker_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $res['Fname']." ".$res['Lname'];
		}
		function return_member($id){
			$sql = 'SELECT  `Fname`, `Lname` FROM `memberinformation` WHERE `Member_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $res['Fname']." ".$res['Lname'];
		}
		function insert_quotation($worker,$member,$request,$jobname){
			$sql = 'INSERT INTO `quotation`(`Worker_ID`, `Member_ID`, `Request_ID`, `JobName`, `ISConfirm`) VALUES ('.$worker.','.$member.','.$request.',"'.$jobname.'",0)';
			mysqli_query($this->link,$sql);
			$sql2 = 'SELECT `Quotation_ID` FROM `quotation` WHERE `Request_ID` = '.$request;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql2));
			return $res['Quotation_ID'];
		}
		function insert_quotation_detail($quotation_id,$quotation_detail,$quotation_price){
			$sql = 'INSERT INTO `quotation_detail`( `Quotation_ID`, `QutationDetail`, `QuotationPrice`) VALUES ('.$quotation_id.',"'.$quotation_detail.'",'.$quotation_price.')';
			mysqli_query($this->link,$sql);
		}
		function Is_request($id){
			$sql = 'UPDATE `request` SET `IsConfirmRequest`= 1 WHERE `Request_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}

		function UnIs_request($id){
			$sql = 'UPDATE `request` SET `IsConfirmRequest`= 0 WHERE `Request_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
		function con_quo($id){
			$sql = 'UPDATE `quotation` SET `ISConfirm`= 1 WHERE `Quotation_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
	}
?>