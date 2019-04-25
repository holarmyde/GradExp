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
$pf_matric_noErr = $D_O_ComplaintErr = $observationsErr =$amount_paidErr = $exerciseErr = $remedyErr = ""; $pf_matric_no = $D_O_Complaint = $observations = $amount_paid = $exercise = $remedy = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["pf_matric_no"]))
     {$pf_matric__noErr = "PersonalFile/Matric No is required";}
   else
     {
     $pf_matric_no = test_input($_POST["pf_matric_no"]);
     // check if personalfile/matric_no only contains numbers and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$pf_no))
       {
       $pf_matric_noErr = "Only numbers and white space allowed"; 
       }
     }
if (empty($_POST["title"]))
     {$titleErr = "Title is required";}
   else
     {
     $title = test_input($_POST["lastname"]);
     // check if last name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$title))
       {
       $titleErr = "Only letters and white space allowed"; 
       }
     }
   

   if (empty($_POST["lastname"]))
     {$lastnameErr = "Last Name is required";}
   else
     {
     $lastname = test_input($_POST["lastname"]);
     // check if last name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lastname))
       {
       $lastnameErr = "Only letters and white space allowed"; 
       }
     }
   
   if (empty($_POST["designation"]))
     {$designationErr = "Designation is required";}
   else
     {
     $designation = test_input($_POST["designation"]);
     // check if password syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$designation))
       {
       $designationErr = "Invalid designation type"; 
       }
     }
     
   if (empty($_POST["department"]))
     {$department = "";}
   else
     {
     $department = test_input($_POST["department"]);
     // check if department syntax is valid
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$department))
       {
       $departmentErr = "department"; 
       }
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

<h2> Card Replacement Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
PF_Matric_No: <input type="integer"name="pf_matric_no" value="<?php echo $pf_matric_no;?>">
   <span class="error">* <?php echo $pf_matric_noErr;?></span>
   <br><br>
  Date of Complaint: <input type="date" name="D_O_Complaint" value="<?php echo $D_O_Complaint;?>">
   <span class="error">* <?php echo $D_O_ComplaintErr;?></span>
   <br><br>
  Observations: <br><br><input type="checkbox" name="" <?php if (isset($observations) && $observations=="You lost your ID Card") echo "checked";?>  value="You_lost_your_ID Card">You lost your ID Card<br><br>
  <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="You want change of designation:") echo "checked";?>  value="You_want_change_of_designation">You want change of designation <br><br>
  <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="Promotion/Appointment Exercise") echo "checked";?>  value="Promotion_Appointment_Exercise">Promotion/Appointment Exercise <br><br>
   
  <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="You want change of passport photograph.") echo "checked";?>  value="You_want_change_of passport_photograph.">You want change of passport photograph.<br><br>
   <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="You want change of surname.") echo "checked";?>  value="You_want_change_of_surnmae.">You want change of surname <br><br>.
    <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="You want change of signature.") echo "checked";?>  value="You_want_change_of_signature.">You want change of signature.<br><br>
     <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="You want change of other names.") echo "checked";?>  value="You_want_change_of_othernames.">You want change of other names.<br><br>
      <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="You want replacement of defaced card.") echo "checked";?>  value="You_want_replacement_of_defaced_card.">You want replacement of defaced card.<br><br>
       <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="You want replacement of holder.") echo "checked";?>  value="You_want_replacement of_holder.">You want replacement of holder. <br><br>
       <span class="error">* <?php echo $observationsErr;?></span>
   <br><br>
      Remedy: <br><br>
  
       <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="Send the Old ID card to MIS Office.") echo "checked";?>  value="mis_office.">Send the Old ID card to MIS Office<br><br>
      Required Amount for payment:<input type="integer" name="amount_paid" value="<?php echo $amount_paid;?>">  <span class="error">* <?php echo $amount_paidErr;?></span>
   <br><br> 
        <input type="checkbox" name="observations" <?php if (isset($observations) && $observations==" Pay required amount to the Id Card Account at the bursary, to cover the replacement/production cost.") echo "checked";?>  value="payment_required."> Pay required amount to the Id Card Account at the bursary, to cover the replacement/production cost.<br><br> 
        <input type="checkbox" name="observations" <?php if (isset($observations) && $observations=="Attach the following documents: Sworn Affidavit, Police Report, and U.I. Sercurity .") echo "checked";?>  value="S_A_P_R_Docs.">Attach the following documents: Sworn Affidavit, Police Report, and U.I. Sercurity.<br><br> 
   <span class="error">* <?php echo $observationsErr;?></span>
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
</html>
