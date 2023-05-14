<?php
session_start();
include '../../dbconnect.php';
$records=array();

$type =$_POST['type'];
// $type ="internship+job";
$result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$_SESSION['recruiterId'].'');
$row2=mysqli_fetch_assoc($result1);
if($type == "all")
{
    $result=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$_SESSION['recruiterId'].'');
 
   while($row=mysqli_fetch_assoc($result))
   {
      if($row['jobType'] == "ij")
      {
         $records[] =array("recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobId"=>$row["jobId"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobStipend"=>$row["stipend"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"]); 
      }
      else
      {
         $records[] =array("recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobId"=>$row["jobId"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobStipend"=>$row["stipend"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"]);

      }
   }    
}
elseif($type == "ij")
{
   $result=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$_SESSION['recruiterId'].' AND `jobType`="'.$type.'"');
   while($row=mysqli_fetch_assoc($result))
{
   $records[] =array("recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobId"=>$row["jobId"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobStipend"=>$row["stipend"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"]); 
}
}
else
{
   $result=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$_SESSION['recruiterId'].' AND `jobType`="'.$type.'"');
   while($row=mysqli_fetch_assoc($result))
{
   $records[] =array("recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobId"=>$row["jobId"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobStipend"=>$row["stipend"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"]); 
}
}

// for($i=0;$i<$records.length();$i++)
// {

// }
// foreach($records as $i => $i_value)
// {

// }
echo json_encode($records);
