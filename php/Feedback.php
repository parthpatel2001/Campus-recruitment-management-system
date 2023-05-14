<?php
//include databe connection file
include '../dbconnect.php';

//check a request
if(isset($_POST["submit"]))
{
	//fetch data from form
	$name=$_POST['name'];
	$email=$_POST['email'];
	$msg=$_POST['msg'];
	$current_date = date("d-m-Y");

//insert data in table using 
	if(mysqli_query($con,'INSERT INTO `feedbackform` VALUES ("","'.$name.'","'.$email.'","'.$msg.'","'.$current_date.'")'))
	{
		echo '<script>if(confirm("Response submited...")){window.location.href = "../home.php";}</script>';
	}
	else {
		{
		echo '<script>alert("Failed to save response...!!")</script>';
	}
	}
}
?>