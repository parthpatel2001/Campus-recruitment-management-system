<?php
include '../../dbconnect.php';

$result = array();
$feedbackId = $_POST['feedbackId'];

if(mysqli_query($con,'DELETE FROM `feedbackform` WHERE `no` ='.$feedbackId.''))
{
    $result=array("status"=>true,"msg"=>"Delete Successfully...!");
}

echo json_encode($result);
?>