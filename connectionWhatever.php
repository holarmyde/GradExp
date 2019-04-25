<?php 
							function getFaculty($faculty)
								{
									include "var.php";
									$connectionString = mysql_connect($host,$uname,$pwd) ;
									if($connectionString)
									{
										mysql_select_db($db);
											
										$facultySql = "SELECT * FROM faculty WHERE facultyid='$faculty'";
												$facultyResult = mysql_query($facultySql);
													if($facultyResult)
														{
															$facultyRow = mysql_fetch_object($facultyResult);
																return $facultyRow->faculty;
														}else{
																return "could not fetch faculty";
														}
								
									}
									else
									{
										return mysql_error($connectionString);
									}
									
								}
	
include "var.php"; 
if(isset($_GET['validation']))
		{
			if(($_GET['validation']=="yes"))
			{
				
				if(isset($_POST['userFromBrowser'])) $username = $_POST['userFromBrowser'];
				if(isset($_POST['passwordFromBrowser']))  $userPassword = $_POST['passwordFromBrowser'];
				
				
				
				if(get_magic_quotes_gpc()) 
				{
					$username = stripslashes(strip_tags($username));
					$userPassword =stripslashes(strip_tags($userPassword));
				 } 
				 else 
				 {
					$username = strip_tags($username);
					$userPassword =strip_tags($userPassword);
				
				 }
				
				$username = mysql_real_escape_string($username);
				$userPassword = mysql_real_escape_string($userPassword);

					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
				if(!$connectionString)
					echo "Could not connect database!";
				else
				{
						mysql_select_db($db);
							$sql = "SELECT * FROM staff WHERE pfNumber = '$userPassword' AND surname LIKE '$username'";
								
									
						$result = mysql_query($sql);
							if($result)
							
							{
								$row =mysql_fetch_object($result);
								if(mysql_num_rows($result)>0)
									{
										session_start();
								
										$_SESSION['surname'] = $row->surname;
										$_SESSION['othernames'] = $row->othernames;
										$_SESSION['pfNumber'] = $row->pfnumber;
										$_SESSION['title'] = $row->title;
										
									
										echo json_encode($row);
									}else{
										echo "1";
									}
							}
							
							
				} 
			
		}
}



if(isset($_GET['getLga']))
{
	if(($_GET['getLga']=="yes"))
	{
		if(isset($_POST['stateValue'])) $stateId = $_POST['stateValue'];
		
	}
		$connectionString = mysql_connect($host,$uname,$pwd) ;
		if(!$connectionString)
			echo "Could not connect database!";
		else
		{
		mysql_select_db("idcard") or die("Could Not select Database");
		$myquery = "SELECT 	lga FROM lga WHERE stateId='$stateId' ORDER BY lga";
		$myresult = mysql_query($myquery);
			if($myresult)
				{
					while ($row= mysql_fetch_object($myresult))
						{
							echo "<option value='$row->lga'>". $row->lga . "</option>";
						}
				}else{
					echo "No lga";
					
				}
		
		}
}
	


if(isset($_GET['getDepartment']))
{
	if(($_GET['getDepartment']=="yes"))
	{
		if(isset($_POST['facultyValue'])) $facultyId = $_POST['facultyValue'];
		
	}
$connectionString = mysql_connect($host,$uname,$pwd) ;
		if(!$connectionString)
			echo "Could not connect database!";
		else
		{
		mysql_select_db("idcard") or die("Could Not select Database");
		$myquery = "SELECT 	department, departmentID FROM departments WHERE facultyID='$facultyId' ORDER BY department";
		$myresult = mysql_query($myquery);
			if($myresult)
				{
					while ($row= mysql_fetch_object($myresult))
						{
							echo "<option value='$row->department'>". $row->department . "</option>";
						}
				}else{
					echo "No department";
					
				}
		
		}
}



if(isset($_GET['savePersonalData']))
		{
			if(($_GET['savePersonalData']=="yes"))
			{
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['surname'])) $surname = $_POST['surname'];
				if(isset($_POST['firstName'])) $firstName = $_POST['firstName'];
				if(isset($_POST['middleName'])) $middleName = $_POST['middleName'];
				if(isset($_POST['maidenName'])) $maidenName = $_POST['maidenName'];
				if(isset($_POST['title'])) $title = $_POST['title'];
				if(isset($_POST['gender'])) $gender = $_POST['gender'];
				if(isset($_POST['maritalStatus'])) $maritalStatus = $_POST['maritalStatus'];
				if(isset($_POST['changedPreviousSurname'])) $changedPreviousSurname = $_POST['changedPreviousSurname'];
				if(isset($_POST['changedPreviousOthernames'])) $changedPreviousOthernames = $_POST['changedPreviousOthernames'];
				

				
				
											 
				if(get_magic_quotes_gpc()) 
				{ 
					$pfNumber = stripslashes(strip_tags($pfNumber));
					$surname = stripslashes(strip_tags($surname));
					$firstName = stripslashes(strip_tags($firstName));
					$middleName = stripslashes(strip_tags($middleName));
					$maidenName = stripslashes(strip_tags($maidenName));
					$title = stripslashes(strip_tags($title));
					$gender = stripslashes(strip_tags($gender));
					$maritalStatus = stripslashes(strip_tags($maritalStatus));
					$changedPreviousOthernames = stripslashes(strip_tags($changedPreviousOthernames));
					$changedPreviousSurname = stripslashes(strip_tags($changedPreviousSurname));
					
				}else{
					$pfNumber = strip_tags($pfNumber);
					$surname = strip_tags($surname);
					$firstName = strip_tags($firstName);
					$middleName = strip_tags($middleName);
					$maidenName = strip_tags($maidenName);
					$title = strip_tags($title);
					$gender = strip_tags($gender);
					$maritalStatus = strip_tags($maritalStatus);
					$changedPreviousOthernames = strip_tags($changedPreviousOthernames);
					$changedPreviousSurname = strip_tags($changedPreviousSurname);
				
				}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
				if(!$connectionString)
					echo "Could not connect database!";
				else
				{
						mysql_select_db($db);
							$sql = "SELECT * FROM currentstaff WHERE pfNumber = '$pfNumber' AND completionStatus = 'complete'";
															
									
						$result = mysql_query($sql);
							if($result)
							
							{
								if(mysql_num_rows($result)>0)
									{
										echo "1"; // you have filled this form before
										
										
									}else{
										$sql1 = "SELECT * FROM currentstaff WHERE pfNumber = '$pfNumber'";
										$result1 = mysql_query($sql1);
										if($result1)
										{
											
											
											
											
											if(mysql_num_rows($result1)<1)
												{
$sql2 = "INSERT INTO currentstaff (pfNumber, surname, firstName, middleName, maidenName, title, gender, maritalStatus, changedPreviousSurname, changedPreviousOthernames) VALUES ('$pfNumber' ,'$surname','$firstName', '$middleName', '$maidenName', '$title', '$gender', '$maritalStatus', '$changedPreviousSurname', '$changedPreviousOthernames')";
												   $result2 = mysql_query($sql2);
															if($result2)
															{ 
																echo "2"; // your information was successfully saved
															}else{
																echo "3"; // your transaction was not successful, please try again
															} // the terminal of insertion result test
												}
												else if(mysql_num_rows($result1)>0) 
												{
$sql3 = "UPDATE currentstaff SET pfNumber = '$pfNumber', surname = '$surname' , firstName = '$firstName' , middleName = '$middleName', maidenName ='$maidenName', title = '$title' , gender = '$gender' , changedPreviousSurname = '$changedPreviousSurname', changedPreviousOthernames = '$changedPreviousOthernames', maritalStatus = '$maritalStatus' WHERE pfNumber = '$pfNumber'";
												   $result3 = mysql_query($sql3);
															if($result3)
															{ 
																echo "22"; // your information was successfully updated
															}else{
																echo "23"; // your update was not successful, please try again
															} // the terminal of insertion result test
													
													
													
												}
											
											
											} 
											else
											{
											echo "4"; // there was an error please try again
											} // the terminal of result1 test
									}
							}else{
							echo "4"; // there was an error please try again
							}
							
							
				} 
			
		}



}





if(isset($_GET['saveOtherData']))
		{
			if(($_GET['saveOtherData']=="yes"))
			{	
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['homeTown'])) $homeTown = $_POST['homeTown'];
				if(isset($_POST['nationality'])) $nationality = $_POST['nationality'];
				if(isset($_POST['state'])) $state = $_POST['state'];
				if(isset($_POST['lga'])) $lga = $_POST['lga'];
				if(isset($_POST['dateOfBirth'])) $dateOfBirth = $_POST['dateOfBirth'];
				if(isset($_POST['placeOfBirth'])) $placeOfBirth = $_POST['placeOfBirth'];
				if(isset($_POST['religion'])) $religion = $_POST['religion'];
				if(isset($_POST['pension'])) $pension = $_POST['pension'];
				
				
				
											 
						if(get_magic_quotes_gpc()) 
						{
							$pfNumber = stripslashes(strip_tags($pfNumber));
							$homeTown = stripslashes(strip_tags($homeTown));
							$nationality = stripslashes(strip_tags($nationality));
							$state = stripslashes(strip_tags($state));
							$lga = stripslashes(strip_tags($lga));
							$dateOfBirth = stripslashes(strip_tags($dateOfBirth));
							$placeOfBirth = stripslashes(strip_tags($placeOfBirth));
							$religion = stripslashes(strip_tags($religion));
							$pension = stripslashes(strip_tags($pension));
							
							
						}else{
							$pfNumber = strip_tags($pfNumber);
							$homeTown = strip_tags($homeTown);
							$nationality = strip_tags($nationality);
							$state = strip_tags($state);
							$lga = strip_tags($lga);
							$dateOfBirth = strip_tags($dateOfBirth);
							$placeOfBirth = strip_tags($placeOfBirth);
							$religion = strip_tags($religion);
							$pension = strip_tags($pension);
											
						}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
						if(!$connectionString)
						{
							echo "11"; // database connection error
						}
						else
						{
								mysql_select_db($db);
								$stateId = $state;
								
						$stateSql = "SELECT state FROM state WHERE stateId='$stateId'";
												$stateResult = mysql_query($stateSql);
													if($stateResult)
														{
															$row = mysql_fetch_object($stateResult);
																$state = $row->state;
														}else{
																echo "could not fetch state";
														}
								
						//$stateReturned = getState($state);																									
$sql = "UPDATE currentstaff SET homeTown = '$homeTown', nationality = '$nationality' , state = '$state' , lga = '$lga', dateOfBirth ='$dateOfBirth', placeOfBirth = '$placeOfBirth' , religion = '$religion' , pensionFundAdministrator = '$pension' WHERE pfNumber = '$pfNumber' ";
								$result = mysql_query($sql);
								if($result)
									{ 
									
										echo "1"; // your information was successfully updated
									}else{
										
										echo "2"; // your update was not successful, please try again
									} // the terminal of insertion result test
																	
							
				}
									
							
		} 
			
		



}





if(isset($_GET['saveOfficialData']))
		{
			if(($_GET['saveOfficialData']=="yes"))
			{	
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['staffCategory'])) $staffCategory = $_POST['staffCategory'];
				if(isset($_POST['dateOfFirstAppointment'])) $dateOfFirstAppointment = $_POST['dateOfFirstAppointment'];
				if(isset($_POST['faculty'])) $faculty = $_POST['faculty'];
				if(isset($_POST['dateOfCurrentAppointment'])) $dateOfCurrentAppointment = $_POST['dateOfCurrentAppointment'];
				if(isset($_POST['appointmentType'])) $appointmentType = $_POST['appointmentType'];
				if(isset($_POST['designationAtAppointment'])) $designationAtAppointment = $_POST['designationAtAppointment'];
				if(isset($_POST['presentDesignation'])) $presentDesignation = $_POST['presentDesignation'];
				if(isset($_POST['departmentOrUnitOrCenter'])) $departmentOrUnitOrCenter = $_POST['departmentOrUnitOrCenter'];
				if(isset($_POST['dateOfConfirmation'])) $dateOfConfirmation = $_POST['dateOfConfirmation'];
								
											 
						if(get_magic_quotes_gpc()) 
						{
							$pfNumber = stripslashes(strip_tags($pfNumber));
							$staffCategory = stripslashes(strip_tags($staffCategory));
							$dateOfFirstAppointment = stripslashes(strip_tags($dateOfFirstAppointment));
							$faculty = stripslashes(strip_tags($faculty));
							$dateOfCurrentAppointment = stripslashes(strip_tags($dateOfCurrentAppointment));
							$appointmentType = stripslashes(strip_tags($appointmentType));
							$designationAtAppointment = stripslashes(strip_tags($designationAtAppointment));
							$presentDesignation = stripslashes(strip_tags($presentDesignation));
							$departmentOrUnitOrCenter = stripslashes(strip_tags($departmentOrUnitOrCenter));
							$dateOfConfirmation = stripslashes(strip_tags($dateOfConfirmation));
							
							
						}else{
							$pfNumber = strip_tags($pfNumber);
							$staffCategory = strip_tags($staffCategory);
							$dateOfFirstAppointment = strip_tags($dateOfFirstAppointment);
							$faculty = strip_tags($faculty);
							$dateOfCurrentAppointment = strip_tags($dateOfCurrentAppointment);
							$appointmentType = strip_tags($appointmentType);
							$designationAtAppointment = strip_tags($designationAtAppointment);
							$presentDesignation = strip_tags($presentDesignation);
							$departmentOrUnitOrCenter = strip_tags($departmentOrUnitOrCenter);
							$dateOfConfirmation = strip_tags($dateOfConfirmation);
											
						}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
						if(!$connectionString)
						{
							echo "11"; // database connection error
						}
						else
						{
								mysql_select_db($db);
								$faculty = getFaculty($faculty);
																														
$sql = "UPDATE currentstaff SET staffCategory = '$staffCategory', dateOfFirstAppointment = '$dateOfFirstAppointment' , dateOfCurrentAppointment = '$dateOfCurrentAppointment' , appintmentType = '$appointmentType', statusOrDesignation ='$designationAtAppointment', presentDesignation = '$presentDesignation' , facultyOrCenter = '$faculty' , departmentUnitOrCenter = '$departmentOrUnitOrCenter', dateOfConfirmation='$dateOfConfirmation' WHERE pfNumber = '$pfNumber' ";
								$result = mysql_query($sql);
								if($result)
									{ 
									
										echo "1"; // your information was successfully updated
									}else{
										
										echo "2"; // your update was not successful, please try again
									} // the terminal of insertion result test
																	
							
				}
									
							
		} 
			
		



}

if(isset($_GET['submitPromotionData']))
		{
			if(($_GET['submitPromotionData']=="yes"))
			{
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['allPromotionsAndRanks'])) $allPromotionsAndRanks = $_POST['allPromotionsAndRanks'];
				if(isset($_POST['levels'])) $levels = $_POST['levels'];
				if(isset($_POST['steps'])) $steps = $_POST['steps'];
				if(isset($_POST['promotionDate'])) $promotionDate = $_POST['promotionDate'];
				 
				if(get_magic_quotes_gpc()) 
				{ 
					$pfNumber = stripslashes(strip_tags($pfNumber));
					$allPromotionsAndRanks = stripslashes(strip_tags($allPromotionsAndRanks));
					$levels = stripslashes(strip_tags($levels));
					$steps = stripslashes(strip_tags($steps));
					$promotionDate = stripslashes(strip_tags($promotionDate));
					
					
				}else{
					$pfNumber = strip_tags($pfNumber);
					$allPromotionsAndRanks = strip_tags($allPromotionsAndRanks);
					$levels = strip_tags($levels);
					$steps = strip_tags($steps);
					$promotionDate = strip_tags($promotionDate);
					
				}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
				if(!$connectionString)
					echo "1"; // we apologize, we could not connect to database
				else
				{
						mysql_select_db($db);
						
							
$sql2 = "INSERT INTO promotions (pfNumber, rank, level, step, promotionDate) VALUES ('$pfNumber' ,'$allPromotionsAndRanks','$levels', '$steps', '$promotionDate')";
						 $result2 = mysql_query($sql2);
							if($result2)
								{ 
									echo "2"; // your information was successfully saved
								}else{
									echo "3"; // your transaction was not successful, please try again
								} // the terminal of insertion result test
							
							
							
					} 
			
		}



}






if(isset($_GET['saveContactData']))
		{
			if(($_GET['saveContactData']=="yes"))
			{	
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['permanentAddress'])) $permanentAddress = $_POST['permanentAddress'];
				if(isset($_POST['residentialAddress'])) $residentialAddress = $_POST['residentialAddress'];
				if(isset($_POST['emailAddress'])) $emailAddress = $_POST['emailAddress'];
				if(isset($_POST['gsmNumber'])) $gsmNumber = $_POST['gsmNumber'];
											 
						if(get_magic_quotes_gpc()) 
						{
							$pfNumber = stripslashes(strip_tags($pfNumber));
							$permanentAddress = stripslashes(strip_tags($permanentAddress));
							$residentialAddress = stripslashes(strip_tags($residentialAddress));
							$emailAddress = stripslashes(strip_tags($emailAddress));
							$gsmNumber = stripslashes(strip_tags($gsmNumber));
							
							
						}else{
							$pfNumber = strip_tags($pfNumber);
							$permanentAddress = strip_tags($permanentAddress);
							$residentialAddress = strip_tags($residentialAddress);
							$emailAddress = strip_tags($emailAddress);
							$gsmNumber = strip_tags($gsmNumber);
							
						}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
						if(!$connectionString)
						{
							echo "1"; // database connection error
						}
						else
						{
								mysql_select_db($db);
								
																														
$sql = "UPDATE currentstaff SET permanentAddress = '$permanentAddress', residentialAddress = '$residentialAddress' , emailAddress = '$emailAddress' , gsmNumber = '$gsmNumber' WHERE pfNumber = '$pfNumber' ";
								$result = mysql_query($sql);
								if($result)
									{ 
									
										echo "2"; // your information was successfully updated
									}else{
										
										echo "3"; // your update was not successful, please try again
									} // the terminal of insertion result test
																	
							
				}
									
							
		} 
			
		



}




if(isset($_GET['saveNextOfKinData']))
		{
			if(($_GET['saveNextOfKinData']=="yes"))
			{	
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['nextOfKinSurname'])) $nextOfKinSurname = $_POST['nextOfKinSurname'];
				if(isset($_POST['nextOfKinFirstName'])) $nextOfKinFirstName = $_POST['nextOfKinFirstName'];
				if(isset($_POST['nextOfKinMiddleName'])) $nextOfKinMiddleName = $_POST['nextOfKinMiddleName'];
				if(isset($_POST['nextOfKinPermanentAddress'])) $nextOfKinPermanentAddress = $_POST['nextOfKinPermanentAddress'];
				if(isset($_POST['nextOfKinEmail'])) $nextOfKinEmail = $_POST['nextOfKinEmail'];
				if(isset($_POST['nextOfKinPhone'])) $nextOfKinPhone = $_POST['nextOfKinPhone'];
				if(isset($_POST['nextOfKinRelationship'])) $nextOfKinRelationship = $_POST['nextOfKinRelationship'];
											 
						if(get_magic_quotes_gpc()) 
						{
							$pfNumber = stripslashes(strip_tags($pfNumber));
							$nextOfKinSurname = stripslashes(strip_tags($nextOfKinSurname));
							$nextOfKinFirstName = stripslashes(strip_tags($nextOfKinFirstName));
							$nextOfKinMiddleName = stripslashes(strip_tags($nextOfKinMiddleName));
							$nextOfKinPermanentAddress = stripslashes(strip_tags($nextOfKinPermanentAddress));
							$nextOfKinEmail = stripslashes(strip_tags($nextOfKinEmail));
							$nextOfKinPhone = stripslashes(strip_tags($nextOfKinPhone));
							$nextOfKinRelationship = stripslashes(strip_tags($nextOfKinRelationship));
							
						}else{
							$pfNumber = strip_tags($pfNumber);
							$nextOfKinSurname = strip_tags($nextOfKinSurname);
							$nextOfKinFirstName = strip_tags($nextOfKinFirstName);
							$nextOfKinMiddleName = strip_tags($nextOfKinMiddleName);
							$nextOfKinPermanentAddress = strip_tags($nextOfKinPermanentAddress);
							$nextOfKinEmail = strip_tags($nextOfKinEmail);
							$nextOfKinPhone = strip_tags($nextOfKinPhone);
							$nextOfKinRelationship = strip_tags($nextOfKinRelationship);
							
						}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
						if(!$connectionString)
						{
							echo "1"; // database connection error
						}
						else
						{
								mysql_select_db($db);
								
																														
$sql = "UPDATE currentstaff SET nextOfKinSurname = '$nextOfKinSurname', nextOfKinFirstName = '$nextOfKinFirstName' , nextOfKinMiddleName = '$nextOfKinMiddleName' , nextOfKinPermanentAddress = '$nextOfKinPermanentAddress', nextOfKinEMail = '$nextOfKinEmail', nextOfKinPhoneNumber = '$nextOfKinPhone', nextOfKinRelationship = '$nextOfKinRelationship' WHERE pfNumber = '$pfNumber' ";
								$result = mysql_query($sql);
								if($result)
									{ 
									
										echo "2"; // your information was successfully updated
									}else{
										
										echo "3"; // your update was not successful, please try again
									}
																	
							
				}
									
							
		} 
			
		



}





if(isset($_GET['submitQualificationData']))
		{
			if(($_GET['submitQualificationData']=="yes"))
			{
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['qualificationType'])) $qualificationType = $_POST['qualificationType'];
				if(isset($_POST['nameOfSchool'])) $nameOfSchool = $_POST['nameOfSchool'];
				if(isset($_POST['yearObtained'])) $yearObtained = $_POST['yearObtained'];
				if(isset($_POST['fieldOfStudy'])) $fieldOfStudy = $_POST['fieldOfStudy'];
				 
				if(get_magic_quotes_gpc()) 
				{ 
					$pfNumber = stripslashes(strip_tags($pfNumber));
					$qualificationType = stripslashes(strip_tags($qualificationType));
					$nameOfSchool = stripslashes(strip_tags($nameOfSchool));
					$yearObtained = stripslashes(strip_tags($yearObtained));
					$fieldOfStudy = stripslashes(strip_tags($fieldOfStudy));

					
					
				}else{
					$pfNumber = strip_tags($pfNumber);
					$qualificationType = strip_tags($qualificationType);
					$nameOfSchool = strip_tags($nameOfSchool);
					$yearObtained = strip_tags($yearObtained);
					$fieldOfStudy = strip_tags($fieldOfStudy);
					
				}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
				if(!$connectionString)
					echo "1"; // we apologize, we could not connect to database
				else
				{
						mysql_select_db($db);
						
							
$sql2 = "INSERT INTO qualifications (pfNumber, qualificationType, schoolName, yearObtained, fieldOfStudy) VALUES ('$pfNumber' ,'$qualificationType','$nameOfSchool', '$yearObtained', '$fieldOfStudy')";
						 $result2 = mysql_query($sql2);
							if($result2)
								{ 
									echo "2"; // your information was successfully saved
								}else{
									echo "3"; // your transaction was not successful, please try again
								} // the terminal of insertion result test
							
							
							
					} 
			
		}



}



if(isset($_GET['saveNYSCData']))
		{
			if(($_GET['saveNYSCData']=="yes"))
			{
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['NYSCCertificateType'])) $NYSCCertificateType = $_POST['NYSCCertificateType'];
				if(isset($_POST['NYSCYear'])) $NYSCYear = $_POST['NYSCYear'];
								 
				if(get_magic_quotes_gpc()) 
				{ 
					$pfNumber = stripslashes(strip_tags($pfNumber));
					$NYSCCertificateType = stripslashes(strip_tags($NYSCCertificateType));
					$NYSCYear = stripslashes(strip_tags($NYSCYear));
					
					
				}else{
					$pfNumber = strip_tags($pfNumber);
					$NYSCCertificateType = strip_tags($NYSCCertificateType);
					$NYSCYear = strip_tags($NYSCYear);
					
				}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
				if(!$connectionString)
					echo "1"; // we apologize, we could not connect to database
				else
				{
						mysql_select_db($db);
																													
$sql = "UPDATE currentstaff SET nyscCertificateType = '$NYSCCertificateType', nyscYear = '$NYSCYear' WHERE pfNumber = '$pfNumber' ";
								$result = mysql_query($sql);
								if($result)
									{ 
									
										echo "2"; // your information was successfully updated
									}else{
										
										echo "3"; // your update was not successful, please try again
									}
		
							
					} 
			
		}



}



if(isset($_GET['delePromotion']))
		{
			if(($_GET['delePromotion']=="yes"))
			{	
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['promotion'])) $promotion = $_POST['promotion'];
											
											 
						if(get_magic_quotes_gpc()) 
						{
							$pfNumber = stripslashes(strip_tags($pfNumber));
							$promotion = stripslashes(strip_tags($promotion));
							
							
							
						}else{
							$pfNumber = strip_tags($pfNumber);
							$promotion = strip_tags($promotion);
							
											
						}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
						if(!$connectionString)
						{
							echo "1"; // database connection error
						}
						else
						{
								mysql_select_db($db);
																														
$sql = "DELETE FROM promotions WHERE pfNumber ='$pfNumber' AND rank ='$promotion'";
								$result = mysql_query($sql);
								if($result)
									{ 
									
										echo "2"; // your information was successfully updated
									}else{
										
										echo "3"; // your update was not successful, please try again
									} // the terminal of insertion result test
																	
							
				}
									
							
		} 
			
		



}




if(isset($_GET['deleteQualification']))
		{
			if(($_GET['deleteQualification']=="yes"))
			{	
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				if(isset($_POST['qualificationToDelete'])) $qualificationToDelete = $_POST['qualificationToDelete'];
				if(isset($_POST['qualificationToDelete1'])) $qualificationToDelete1 = $_POST['qualificationToDelete1'];
											
											 
						if(get_magic_quotes_gpc()) 
						{
							$pfNumber = stripslashes(strip_tags($pfNumber));
							$qualificationToDelete = stripslashes(strip_tags($qualificationToDelete));
							$qualificationToDelete1 = stripslashes(strip_tags($qualificationToDelete1));
							
							
							
						}else{
							$pfNumber = strip_tags($pfNumber);
							$qualificationToDelete = strip_tags($qualificationToDelete);
							$qualificationToDelete1 = strip_tags($qualificationToDelete1);
							
											
						}
					
				$connectionString = mysql_connect($host,$uname,$pwd) ;
						if(!$connectionString)
						{
							echo "1"; // database connection error
						}
						else
						{
								mysql_select_db($db);

																														
$sql = "DELETE FROM qualifications WHERE qualificationType ='$qualificationToDelete' AND pfNumber ='$pfNumber' AND fieldOfStudy ='$qualificationToDelete1'";
								$result = mysql_query($sql);
								if($result)
									{ 
									
										echo "2"; // your information was successfully updated
									}else{
										
										echo "3"; // your update was not successful, please try again
									} // the terminal of insertion result test
																	
							
				}
									
							
		} 
			
		



}




if(isset($_GET['getPreviewData']))
		{
			if(($_GET['getPreviewData']=="yes"))
			{
				
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				
				$connectionString = mysql_connect($host,$uname,$pwd) ;
				if(!$connectionString)
					echo "1"; // could not connect to database
				else
				{
					mysql_select_db($db);
					$sql = "SELECT * FROM currentstaff WHERE pfNumber = '$pfNumber'";
					$result = mysql_query($sql);
						if($result)
							
							{
								$row =mysql_fetch_object($result);
																	
										echo json_encode($row);
							}else{
							
							echo "3";
							}
				}
							
				
			
		}
}


if(isset($_GET['getPromotionData']))
		{
			if(($_GET['getPromotionData']=="yes"))
			{
				
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				
				$connectionString = mysql_connect($host,$uname,$pwd) ;
				if(!$connectionString)
					echo "1"; // could not connect to database
				else
				{
					mysql_select_db($db);
					$sql = "SELECT * FROM promotions WHERE pfNumber = '$pfNumber' ORDER BY promotionDate";
					$result = mysql_query($sql);
						if($result)
							
							{
								while($row =mysql_fetch_object($result))
								{
								echo "<tr><td>".$row->rank ."</td><td>".$row->level ."</td><td>".$row->step ."</td><td>".$row->promotionDate ."</td></tr>";
								}
																	
										
							}else{
							
							echo "3";
							}
				}
							
				
			
		}
}


if(isset($_GET['getQualificationData']))
		{
			if(($_GET['getQualificationData']=="yes"))
			{
				
				if(isset($_POST['pfNumber'])) $pfNumber = $_POST['pfNumber'];
				
				$connectionString = mysql_connect($host,$uname,$pwd) ;
				if(!$connectionString)
					echo "1"; // could not connect to database
				else
				{
					mysql_select_db($db);
					$sql = "SELECT * FROM qualifications WHERE pfNumber = '$pfNumber' ORDER BY yearObtained";
					$result = mysql_query($sql);
						if($result)
							
							{
								while($row =mysql_fetch_object($result))
								{
								echo "<tr><td>".$row->qualificationType ."</td><td>".$row->fieldOfStudy ."</td><td>".$row->schoolName ."</td><td>".$row->yearObtained ."</td></tr>";
								}
																	
										
							}else{
							
							echo "3";
							}
				}
							
				
			
		}
}









?>