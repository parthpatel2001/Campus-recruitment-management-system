<?php
include 'dbconnect.php';
$records=array();

$status =$_POST['status'];

   $result=mysqli_query($con,"SELECT * FROM `recruiter` WHERE `accountStatus`='$status'");
   while($row=mysqli_fetch_assoc($result))
{
   $records[] =array("recruiterId"=>$row["recruiterId"],"recruiterName"=>$row["recruiterName"],"recruiterEmail"=>$row["recruiterEmail"],"recruiterPassword"=>$row["recruiterPassword"],"recruiterPhone"=>$row["recruiterPhone"],"recruiterProfilepic"=>$row["recruiterProfilepic"],"companyName"=>$row["companyName"],"companyLogo"=>$row["companyLogo"],"companyDescription"=>$row["companyDescription"],"companyEmail"=>$row["companyEmail"],"companyWebsite"=>$row["companyWebsite"],"companyLocation"=>$row["companyLocation"],"companyAddress"=>$row["companyAddress"],"accountStatus"=>$row["accountStatus"]);
}

echo json_encode($records);
?>