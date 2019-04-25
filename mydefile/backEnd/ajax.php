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
		$_POST['email']? $email= $_POST['email']: $email= "";
		$_POST['programme']? $programme= $_POST['programme']: $programme= "";
		$_POST['gender']? $gender= $_POST['gender']: $gender= "";
		$_POST['state_of_origin']? $state_of_origin= $_POST['state_of_origin']: $state_of_origin= "";
		$_POST['nationality']? $nationality= $_POST['nationality']: $nationality= "";
		$_POST['local_govt_area']? $local_govt_area= $_POST['local_govt_area']: $local_govt_area= "";
		$_POST['blood_group']? $blood_group= $_POST['blood_group']: $blood_group= "";
		$_POST['blood_genotype']? $blood_genotype= $_POST['blood_genotype']: $blood_genotype= "";
		$_POST['passport']? $passport= $_POST['passport']: $passport= "";
		
		
		

	}
	
	$conn = mysql_connect($host,$uname,$pwd);
	if($conn)
	{
		$DBselect = mysql_select_db($db);
			if($DBselect)
			{
$query = "INSERT INTO student1 (matric_no, firstname, middlename, lastname, D_O_B, email, Gender, program_type, degree, entry_dept, level, state_of_origin, nationality, local_gov, blood_type, genotype, passport) VALUES ('$matricNo', '$firstName', '$middleName', '$surname', '$dateOfBirth', '$email', '$gender', '$programme', 'degree', 'entry_dept', 'level', 'state_of_origin', 'nationality', 'local_gov', 'blood_type', 'genotype', 'passport')";
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