<?php
session_start();
include '../../dbconnect.php';

$jobTitle=$_POST['title'];
$vacancy=$_POST['vacancy'];
$type=$_POST['type'];
$exprience=$_POST['exprience'];
$stipend=$_POST['stipend'];
$lastdate=date('d-m-Y',strtotime($_POST['lastdate']));
$salary=$_POST['salary'];
$category=$_POST['category'];
$jobMode=$_POST['workMode'];
$location=$_POST['location'];

// SELECT * FROM `job` WHERE `recruiterId` AND `jobTitle`

$result=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$_SESSION['recruiterId'].' AND `jobTitle`="'.$jobTitle.'"');
$num = mysqli_num_rows($result);

if($num == 0)
{
    $id=$_SESSION['recruiterId'];
$query="INSERT INTO `job`VALUES ('',$id,'$jobTitle','$type','$jobMode','$category','$stipend','$salary','$lastdate','$location','$vacancy','$exprience')";
// echo $query;
    
    if(mysqli_query($con,$query))
    {
echo '<script>if(confirm("Inserted Successfully.")){ window.location.href = "../rjob.php"; }</script>';
    }
    else
    {
echo '<script>if(confirm("Insertion Failed.")){ window.location.href = "../rjob.php"; }</script>';
    }
}
else
{
echo '<script>if(confirm("This Job is alredy exist.")){ window.location.href = "../rjob.php"; }</script>';
}
?>