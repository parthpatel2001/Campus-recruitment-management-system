<?php
include 'dbconnect.php';
$enrollment=$_POST['id'];
// $enrollment=65498;
$ProfilePicturefolder = "./../../student/ProfilePicture/";
$Resumefolder = "../../student/Resume/";
$result1=mysqli_query($con,"SELECT * FROM `student` WHERE `studentId` IN($enrollment)");

$num=mysqli_num_rows($result1);
if($num>0)
{
    while($studentData = mysqli_fetch_assoc($result1))
    {
        if(mysqli_query($con,'DELETE FROM `application` WHERE `studentId` = '.$studentData['studentId'].''))
        {
            $query1='DELETE FROM `student` WHERE `studentId` = '.$studentData['studentId'].'';
            if(mysqli_query($con,$query1))
            {            
                
                    if($studentData['studentProfilepicture']!="NA" && $studentData['studentResume'] !="NA")
                    {
                        unlink($ProfilePicturefolder . $studentData['studentProfilepicture']);
                        unlink($Resumefolder . $studentData['studentResume']);
                    }
                $result=array("status"=>true,"msg"=>"Delete Successfully...!");
            }
            else
            {
                $result=array("status"=>false,"msg"=>"Delete Failed...!");
            }
        }
            else
            {
                $result=array("status"=>false,"msg"=>"Delete Failed...!");
            }
    }
    
   
}
else
{
    $result=array("status"=>false,"msg"=>"Student Id not found...!");
}
echo json_encode($result);
?>