<?php


$con=mysqli_connect("localhost","root","","misict1");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
// define variables and set to empty values 

 $firstname = $lastname = $title = $age  = "";

$firstname = mysqli_real_escape_string($_POST['firstname']['title']);
$lastname = mysqli_real_escape_string($_POST['lastname'] ['title']);
$age = mysqli_real_escape_string($_POST['age']);

$sql="INSERT INTO Staffid (FirstName, LastName, Age)
VALUES ($firstname, $lastname, $age)";

if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);
?> 