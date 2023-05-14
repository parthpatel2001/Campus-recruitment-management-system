<?php
$con = mysqli_connect("localhost","root","","campus");

$scheduleId =$_POST['scheduleId'];
$title = $_POST['title'];
$description = $_POST['description'];

$query = 'UPDATE `schedule` SET `scheduleTitle`="'.$title.'",`scheduleDecription`="'.$description.'" WHERE `scheduleId` ='.$scheduleId.'';

if(mysqli_query($con,$query))
{
    // echo "Data Inserted.";
    ?>
    <script>
        if(confirm("Update Successfull."))
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
        if(confirm("Update Failed..!"))
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