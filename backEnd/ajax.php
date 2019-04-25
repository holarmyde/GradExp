<?php

include "vars.php";
if(isset($_GET['sendingFromScript']))
{
	if($_GET['sendingFromScript']=='yes')
	{
		$_POST['matricNo']? $matricNo= $_POST['matricNo']: $matricNo= "";
		$_POST['surname']? $surname= $_POST['surname']: $surname= "";
		$_POST['firstName']? $firstName= $_POST['firstName']: $firstName= "";
		$_POST['middleName']? $middleName= $_POST['middleName']: $middleName= "";
		$_POST['dateOfBirth']? $dateOfBirth= $_POST['dateOfBirth']: $dateOfBirth= "";
		$_POST['programme']? $programme= $_POST['programme']: $programme= "";
		$_POST['gender']? $gender= $_POST['gender']: $gender= "";

	}
	
	$conn = mysql_connect($host,$uname,$pwd);
	if($conn)
	{
		$DBselect = mysql_select_db($db);
			if($DBselect)
			{
$query = "INSERT INTO student1 (matric_no, firstname, middlename, lastname, D_O_B, Gender, program_type) VALUES ('$matricNo', '$firstName', '$middleName', '$surname', '$dateOfBirth', '$gender', '$programme')";
				$result =mysql_query($query);
				if($result)
				{
					echo "you data submition was successful";
				}
				else
				{
					echo "3";
				}
			}else{
			echo "2";
			}
	}else{
	echo "1";
	}

}


?>