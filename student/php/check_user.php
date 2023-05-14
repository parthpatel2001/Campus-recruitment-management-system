<?php
session_start();
include '../../dbconnect.php';

$query = mysqli_query($con,'SELECT * FROM `student` WHERE `studentId` = '.$_SESSION['studentId'].'');
$row=mysqli_fetch_assoc($query);

if($row["lastLogin"] == "NA")
{
    $result=array("status"=>true);
}
else
{
    $result=array("status"=>false);
}
echo json_encode($result);
