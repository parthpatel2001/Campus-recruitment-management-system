<?php
session_start();
include 'dbconnect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$result = array();

$query = mysqli_query($con, 'SELECT * FROM `admin` WHERE `adminEmail` = "' . $_SESSION['email'] . '"');
$admin = mysqli_fetch_assoc($query);

$profile_pic= $admin['adminpic'];


if (isset($_FILES['profile']['name']) AND !empty($_FILES['profile']['name'])) 
{
    if(unlink("../profilePicture/".$profile_pic))
    {
        $image = $_FILES["profile"]["name"];
        $img_target_dir = "../profilePicture/";
        $image_ext = explode('.', $image);
        $ext = end($image_ext);
        $image_name = rand(100, 9999999) . '.' . $ext;
        $newimage = $img_target_dir.$image_name;
        if(move_uploaded_file($_FILES["profile"]["tmp_name"], $newimage) && mysqli_query($con,'UPDATE `admin` SET `adminName`="'.$name.'", `adminpic`="'.$image_name.'" WHERE `adminEmail` = "'.$email.'"'))
        {
            $query1 = mysqli_query($con, 'SELECT * FROM `admin` WHERE `adminEmail` = "' . $email . '"');
            $admin1 = mysqli_fetch_assoc($query1);
            $_SESSION["id"]=$admin1['adminId'];
            $_SESSION["name"]=$admin1['adminName'];
            $_SESSION["email"]=$admin1['adminEmail'];
            $_SESSION["adminpic"]=$admin1['adminpic'];

            $result = array("status"=>true,"msg"=>"Update Successfull.");
        }
        else
        {
            $result = array("status"=>false,"msg"=>"Update failed...!");
        }
    }
    else
    {
        $result = array("status"=>false,"msg"=>"Update failed...!");
    }
}
else
{
    if(mysqli_query($con,'UPDATE `admin` SET `adminName`="'.$name.'" WHERE `adminEmail` ="'.$email.'"'))
    {
        $query1 = mysqli_query($con, 'SELECT * FROM `admin` WHERE `adminEmail` = "' . $email . '"');
        $admin1 = mysqli_fetch_assoc($query1);
        $_SESSION["id"]=$admin1['adminId'];
        $_SESSION["name"]=$admin1['adminName'];
        $_SESSION["email"]=$admin1['adminEmail'];
        $_SESSION["adminpic"]=$admin1['adminpic'];
        $result = array("status"=>true,"msg"=>"Update Successfull.");
    }
    else
    {
        $result = array("status"=>false,"msg"=>"Update failed...!");
    }
}


    echo json_encode($result);
?>