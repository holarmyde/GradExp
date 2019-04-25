 <!DOCTYPE html>
<html lang="en">
<head>

           <title>MIS UI</title>

           <link type="text/css" rel= "stylesheet" href= "style.css" media= "screen">

       <body>
     <div id="container">
         <header>
              <div id="logo_dv">
                <h1> MANAGEMENT INFORMATION SYSTEM UNIT UNIVERSITY OF IBADAN <img src="uilogo.png" alt="" width="100" height="70" /></h1>
            </div>

             <div id="navigation_dv">
                <nav>
                 
                 <ul>
                     <a href=""><li>Home</li></a>
                     <a href=""><li>About Us</li></a>
                     <a href=""><li>Our Portfolio</li></a>
                     <a href=""><li>Our Services</li></a>
                     <a href=""><li>Contact Us</li></a>
                     <a href=""><li>Career</li></a>
<<
                 </ul>
                </nav>

            </div>
          </header>

          <section>
<?php
// define variables and set to empty values 
$pf_noErr = $titleErr = $firstnameErr = $middlenameErr = $lastnameErr = $designationErr = $D_O_BErr = $emailErr = $genderErr = $staff_categoryErr = $departmentErr = $facultyErr = $entry_fac_inst_unitErr =  $state_of_originErr = $nationalityErr = $local_govt_areaErr = $D_O_First_apptErr = $salary_level_n_stepErr = $next_of_kinErr = $blood_groupErr = $blood_genotypeErr = $signatureErr = $passportErr ="";
$pf_no = $title = $firstname = $middlename = $lastname = $designation = $D_O_B = $email = $gender = $staff_category = $department = $faculty = $entry_fac_inst_unit =  $state_of_origin = $nationality = $local_govt_area = $D_O_First_appt = $salary_level_n_step = $next_of_kin = $blood_group = $blood_genotype =  $signature = $passport = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["pf_no"]))
     {$pf_noErr = "PersonalFile No is required";}
   else
     {
     $pf_no = test_input($_POST["pf_no"]);
     // check if matric_noname only contains numbers and whitespace
	 
       
     }
if (empty($_POST["title"]))
     {$titleErr = "Title is required";}
   else
     {
     $title = test_input($_POST["lastname"]);
     // check if last name only contains letters and whitespace
     
     }
   

   if (empty($_POST["lastname"]))
     {$lastnameErr = "Last Name is required";}
   else
     {
     $lastname = test_input($_POST["lastname"]);
     // check if last name only contains letters and whitespace
   
     }
   
   if (empty($_POST["designation"]))
     {$designationErr = "Designation is required";}
   else
     {
     $designation = test_input($_POST["designation"]);
     // check if password syntax is valid
     
     }
     
   if (empty($_POST["department"]))
     {$department = "";}
   else
     {
     $department = test_input($_POST["department"]);
     // check if department syntax is valid
    
     }

   if (empty($_POST["faculty"]))
     {$faculty = "";}
   else
     {$faculty = test_input($_POST["faculty"]);}

   if (empty($_POST["gender"]))
     {$genderErr = "Gender is required";}
   else
     {$gender = test_input($_POST["gender"]);}
}

function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>

<h2>Staff Identification Card Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  PF_No: <input type="integer" name="pf_no" value="<?php echo $pf_no;?>">
   <span class="error">* <?php echo $pf_noErr;?></span>
   <br><br>
   Title: <input type="text" name="title" value="<?php echo $title;?>">
   <span class="error">* <?php echo $titleErr;?></span>
   <br><br> 
   First Name: <input type="text" name="name" value="<?php echo $firstname;?>">
   <span class="error">* <?php echo $firstnameErr;?></span>
   <br><br> 
   Middle Name: <input type="text" name="middlename" value="<?php echo $middlename;?>">
   <span class="error">* <?php echo $middlenameErr;?></span>
   <br><br> 
   Last Name: <input type="text" name="lastname" value="< >">
   <span class="error">* <?php echo $lastnameErr;?></span>
   <br><br>
   Designation: <input type="text" name="designation" value="<?php echo $designation;?>">
   <span class="error">* <?php echo $designationErr;?></span>
   <br><br>
   Date Of Birth: <input type="date" name="D_O_B" value="<?php echo $D_O_B;?>">
   <span class="error">* <?php echo $D_O_BErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
    Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female" > Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male"> Male
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
  Staff Category: <input type="radio" name="staff_category" <?php if (isset($staff_category) && $staff_category=="academics") echo "checked";?>  value="academics">Academics
  <input type="radio" name="staff_category" <?php if (isset($staff_category) && $staff_category=="Senior staff") echo "checked";?>  value="seniorstaff">Senior staff
  <input type="radio" name="staff_category" <?php if (isset($staff_category) && $staff_category=="junior staff") echo "checked";?>  value="juniorstaff">Junior Staff
    
   <span class="error">* <?php echo $staff_categoryErr;?></span>
   <br><br>
   Department: <input type="text" name="department" value="<?php echo $department;?>">
   <span class="error">* <?php echo $departmentErr;?></span>
   <br><br>
   Faculty: <input type="text" name="faculty" value="<?php echo $faculty;?>">
   <span class="error">* <?php echo $facultyErr;?></span>
   <br><br>
   Entry faculty/Inst/unit: <input type="text" name="entry_fac_inst_unit" value="<?php echo $entry_fac_inst_unit;?>">
   <span class="error">* <?php echo $entry_fac_inst_unitErr;?></span>
   <br><br>
  
   State of Origin: <input type="text" name="state_of_origin" value="<?php echo $state_of_origin;?>">
   <span class="error">* <?php echo $state_of_originErr;?></span>
   <br><br>
   Nationality: <input type="text" name="nationality" value="<?php echo $nationality;?>">
   <span class="error">* <?php echo $nationalityErr;?></span>
   <br><br>
   Local Govt Area: <input type="text" name="local_govt_area" value="<?php echo $local_govt_area;?>">
   <span class="error">* <?php echo $local_govt_areaErr;?></span>
   <br><br>
  
   Date of First Appointment: <input type="date" name="D_O_First_appt" value="<?php echo $D_O_First_appt;?>">
   <span class="error">* <?php echo $D_O_First_apptErr;?></span>
   <br><br>
   Salary level and step: <input type="text" name="salary_level_n_step" value="<?php echo $salary_level_n_step;?>">
   <span class="error">* <?php echo $salary_level_n_stepErr;?></span>
   <br><br>
   Next Of Kin: <input type="text" name="next_of_kin" value="<?php echo $next_of_kin;?>">
   <span class="error">* <?php echo $next_of_kinErr;?></span>
   <br><br>
   
   
 Blood Group: <input type="radio" name="blood_group" <?php if (isset($blood_group) && $blood_group=="A+") echo "checked";?>  value="A+">A+
  <input type="radio" name="blood_group" <?php if (isset($blood_group) && $blood_group=="B+") echo "checked";?>  value="B+">B+
  <input type="radio" name="blood_group" <?php if (isset($blood_group) && $blood_group=="AB") echo "checked";?>  value="AB">AB
  <input type="radio" name="blood_group" <?php if (isset($blood_group) && $blood_group=="O+") echo "checked";?>  value="O+">O+
   <span class="error">* <?php echo $blood_groupErr;?></span>
   <br><br>
   Blood Genotype: <input type="radio" name="blood_genotype" <?php if (isset($blood_genotype) && $blood_genotype=="AA") echo "checked";?>  value="AA">AA
  <input type="radio" name="blood_genotype" <?php if (isset($blood_genotype) && $blood_genotype=="AS") echo "checked";?>  value="AS">AS
  <input type="radio" name="blood_genotype" <?php if (isset($blood_genotype) && $blood_genotype=="SS") echo "checked";?>  value="SS">SS
  <input type="radio" name="blood_genotype" <?php if (isset($blood_genotype) && $blood_genotype=="SC") echo "checked";?>  value="SC">SC
   <span class="error">* <?php echo $blood_genotypeErr;?></span>
   <br><br>
  Signature: <input type="blob" name="signature" value="<?php echo $signature;?>
   ">
   <span class="error">* <?php echo $signatureErr;?></span>
   <br><br>
   Passport: <input type="blob" name="passport" value="<?php echo $passport;?>
   ">
   <span class="error">* <?php echo $passportErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
  

   
</form>


        </section>

         <footer>
              <div id ="follow_us">
                   <ul>
                       <li><a href=""><img src="logo/like.png"/> us on facebook</a></li>
                       <li><a href=""><img src="logo/plus-one.png"/> us on google </a></li>
                       <li><a href=""><img src="logo/twitter_icn.png"/> tweet us on twitter</a></li>

       </ul>

 </div>


                <div id ="copy_right">

             &copy; copyright 2013

     </div>


         </footer>

     </div>
  


    

</body>
    
  </head>
  </html>
