<?php
$con = mysqli_connect("localhost","root","","campus");


$jobid = $_POST['job'];
$title = $_POST['title'];
$placementdate = $_POST['date_picker'];
$description = $_POST['description'];
$createdDate=date("d-m-yy");
// echo $createdDate;

$query = 'insert into schedule (scheduleId	, jobId , scheduleCreateddate, scheduleTitle, scheduleDecription, schedulePlacementdate, scheduleStatus	) values("",'.$jobid.', "'.$createdDate.' ", "'.$title.'", "'.$description.'" , "'.$placementdate.'" , "active")';

if(mysqli_query($con,$query))
{
    // echo "Data Inserted.";
    ?>
    <script>
        if(confirm("Schedule create successfully."))
        {
            window.location.href= "../schedule.php";

        }
        else
        {
            window.location.href= "../schedule.php";

        }
    </script>
    <?php

}

else
{
    // echo "Data failed.";
    ?>
    <script>
        if(confirm("Schedule create unsuccessfully."))
        {
            window.location.href= "../schedule.php";
        }
        else
        {
            window.location.href= "../schedule.php";

               }
    </script>
    <?php
    
}

?>