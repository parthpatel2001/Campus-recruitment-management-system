<?php
include 'dbconnect.php';

$studentEnrollment=$_POST['studentEnrollment'];
$studentName=$_POST['studentName'];
$studentEmail=$_POST['studentEmail'];
$studentPhone=$_POST['studentPhone'];
$studentAddress=$_POST['studentAddress'];
$studentCollagename=$_POST['studentCollagename'];
$studentBranch=$_POST['studentBranch'];
$studentCurrentsemester=$_POST['studentCurrentsemester'];
$studentCGPA=$_POST['studentCGPA'];
$tenthmark=$_POST['tenthmark'];
$twelvethmark=$_POST['twelvethmark']; //12 mark / Diploma mark
$studentStartingYear=$_POST['studentStartingYear'];
$studentEndingYear=$_POST['studentEndingYear'];

$checkEnrollment=mysqli_query($con,"SELECT * FROM `student` WHERE `studentId`='$studentEnrollment'");
if(mysqli_num_rows($checkEnrollment)>0)
{
    $query="UPDATE `student` SET `studentName`='$studentName',`studentEmail`='$studentEmail',`studentPhone`='$studentPhone',`studentAddress`='$studentAddress',`studentCollagename`='$studentCollagename',`studentBranch`='$studentBranch',`studentCurrentsemester`=$studentCurrentsemester,`studentCGPA`='$studentCGPA',`10th_Percentage`='$tenthmark',`12th_Percentage`='$twelvethmark',`studentStartingyear`=$studentStartingYear,`studentEndingyear`=$studentEndingYear WHERE `studentId` =$studentEnrollment";
    $query1="UPDATE `application` SET `studentName`='$studentName',`studentEmail`='$studentEmail' WHERE `studentId` =$studentEnrollment";
    if(mysqli_query($con,$query))
    {
        mysqli_query($con,$query1);
        $result=array("status"=>true,"msg"=>"Update Successfully.");
    }
    else
    {
        $result=array("status"=>true,"msg"=>"Update Failed.");
    }
}
else{
    $result=array("status"=>true,"msg"=>"Enrollment Not found.");
}
echo json_encode($result);
?>