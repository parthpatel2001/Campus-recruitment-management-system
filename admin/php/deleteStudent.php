<?php
include 'dbconnect.php';
$enrollment = $_POST['id'];
// $enrollment=65498;
$ProfilePicturefolder = "./../../student/ProfilePicture/";
$Resumefolder = "../../student/Resume/";

$result = mysqli_query($con, "SELECT * FROM `student` WHERE `studentId` = $enrollment");

if (mysqli_num_rows($result) == 0) {
    $result = array("status" => false, "msg" => "Enrollment does not Exist.");
} else {

    $studentData = mysqli_fetch_assoc($result);
    
        if (mysqli_query($con, 'DELETE FROM `application` WHERE `studentId` = ' . $enrollment . '')) {
            $query1 = "DELETE FROM `student` WHERE `studentId` IN($enrollment)";
            if (mysqli_query($con, $query1)) {
                if($studentData['studentProfilepicture']!="NA" && $studentData['studentResume'] !="NA")
                {
                    unlink($ProfilePicturefolder . $studentData['studentProfilepicture']);
                    unlink($Resumefolder . $studentData['studentResume']);
                }

                $result = array("status" => true, "msg" => "Delete Successfully...!");
            } else {
                $result = array("status" => false, "msg" => "Delete Failed...!");
            }
        } else {
            $result = array("status" => false, "msg" => "Delete Failed...!");
        }
  
}
// $result=array("status"=>true,"msg"=>$enrollment[1]);

echo json_encode($result);
