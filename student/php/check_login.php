<?php
session_start();

include '../../dbconnect.php';

$enrollment=$_POST['enrollment'];
$password=$_POST['password'];

// Fetch a enrollment number in student table
$result=mysqli_query($con,'SELECT * FROM `student` WHERE`studentId`="'.$enrollment.'"');
$row=mysqli_fetch_assoc($result);
if($num=mysqli_num_rows($result)>0)
{
    if($password==$row['studentPassword'])
    {
        $_SESSION["studentId"]=$row['studentId'];
        $_SESSION["studentName"]=$row['studentName'];
        $_SESSION["studentEmail"]=$row['studentEmail'];
        $_SESSION["studentProfilepicture"]=$row['studentProfilepicture'];
        $_SESSION["lastLogin"]=  $row["lastLogin"];
        $_SESSION["student"]=true;
        $date =date("d-m-y");
        $studentData=array("status"=>TRUE,"msg"=>"Login Successfull.");
        echo json_encode($studentData);
    }
    else
    {
    $studentData=array("status"=>FALSE,"msg"=>"Invalid Password.");
    echo json_encode($studentData);
    }
}
else{
    $studentData=array("status"=>FALSE,"msg"=>"Enrollment not Found.");
    echo json_encode($studentData);

}
?>