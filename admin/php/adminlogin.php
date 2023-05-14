<?php
session_start();
include 'dbconnect.php';
$username=$_POST['username'];
$password=$_POST['password'];



$result = array();

$query="SELECT * FROM `admin` WHERE `adminName` = '$username'";
$result= mysqli_query($con, $query);
if($row=mysqli_fetch_assoc($result))
{
    if($username==$row['adminName'] && $password == $row['password'])
    {
        $_SESSION["id"]=$row['adminId'];
        $_SESSION["name"]=$row['adminName'];
        $_SESSION["email"]=$row['adminEmail'];
        $_SESSION["adminpic"]=$row['adminpic'];
        $_SESSION["adminLogin"]=true;
        // $path=$_SESSION["path"];
        // header("location:../AdminDashboard.php");
        $result=array("status"=>TRUE,"msg"=>"Login Successfull.");
    }
    else
    {
        $result=array("status"=>FALSE,"msg"=>"Invalid Username or Password.");
        $_SESSION["login"]=false;
    }
}
else
{
    $result=array("status"=>FALSE,"msg"=>"Invalid Username or Password.");
    $_SESSION["login"]=false;
}

echo json_encode($result)
?>