<?php
include '../../dbconnect.php';
$records = array();

$query = mysqli_query($con, 'SELECT * FROM `feedbackform`');

while($feedback = mysqli_fetch_assoc($query))
{
    $records []=array("no"=>$feedback['no'],"name"=>$feedback['name'],"email"=>$feedback['email'],"message"=>$feedback['message'],"posted_date"=>$feedback['posted_date']);
}

echo json_encode($records);
?>