<?php
include '../../dbconnect.php';

$company=$_POST['recruiterId'];
$category=$_POST['category'];
$type=$_POST['type'];
$records =array();
if($company == "all")
{
    if($category == "all")
    {
        if($type == "all")
        {
            // If all variable vaule are all then fetch all data from table
            // fetch all jobs
            $result=mysqli_query($con,'SELECT * FROM `job`');
            while($row=mysqli_fetch_assoc($result))
            {
            // fetch only recruiter data
                $result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row["recruiterId"].'');
                $row2=mysqli_fetch_assoc($result1);
                if($row2['accountStatus']== "active")
                {
                    if($row['jobType'] == "ij")
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']); 
                    }
                    else
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']);
                
                    }
                }
            }    
        }
        else
        {
            // If all type variable vaule is different then fetch all data accroding type variable value from table

            $result=mysqli_query($con,'SELECT * FROM `job` WHERE `jobType`="'.$type.'"');
            while($row=mysqli_fetch_assoc($result))
            {
                // fetch only recruiter data
                $result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row["recruiterId"].'');
                $row2=mysqli_fetch_assoc($result1);
                if($row2['accountStatus']== "active")
                {
                    if($row['jobType'] == "ij")
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']); 
                    }
                    else
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']);
                
                    }
                 }
            }    
        }
    }
    else
    {
        // If  category variable vaule is different then fetch all data accroding category variable value from table
        // Here first check a type var value
        if($type == "all")
        {
            // If type variable vaule is all then fetch all data from table with given category
            // fetch  jobs according category 
            $result=mysqli_query($con,'SELECT * FROM `job` WHERE `jobCategory`="'.$category.'"');
            while($row=mysqli_fetch_assoc($result))
            {
                // fetch only recruiter data
                $result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row["recruiterId"].'');
                $row2=mysqli_fetch_assoc($result1);
                if($row2['accountStatus']== "active")
                {
                    if($row['jobType'] == "ij")
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']); 
                    }
                    else
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']);
                
                    }
                }
            }    
        }
        else
        {
            // fetch data from table accrording type and categorty var value
            $result=mysqli_query($con,'SELECT * FROM `job` WHERE `jobCategory`="'.$category.'" AND `jobType`="'.$type.'"');
            while($row=mysqli_fetch_assoc($result))
            {
                // fetch only recruiter data
                $result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row["recruiterId"].'');
                $row2=mysqli_fetch_assoc($result1);
                if($row2['accountStatus']== "active")
                {
                    if($row['jobType'] == "ij")
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']); 
                    }
                    else
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']);
                
                    }
                }
            }    
        }

    }
        
}
else
{
    // fetch data from table accrording $company var value

    if($category=="all")
    {
        if($type == "all")
        {
            // If all variable vaule are all then fetch all data from table
            // fetch all jobs
            $result=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$company.'');
            while($row=mysqli_fetch_assoc($result))
            {
                // fetch only recruiter data
                $result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row["recruiterId"].'');
                $row2=mysqli_fetch_assoc($result1);
                if($row2['accountStatus']== "active")
                {
                    if($row['jobType'] == "ij")
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']); 
                    }
                    else
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']);
                
                    }
                }
            }  
        } 
        else{
                // If  type and company variable vaule are different then fetch all data accroding type and company variable value from table

                $result=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$company.' AND `jobType`="'.$type.'"');
                while($row=mysqli_fetch_assoc($result))
                {
                    // fetch only recruiter data
                    $result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row["recruiterId"].'');
                    $row2=mysqli_fetch_assoc($result1);
                    if($row2['accountStatus']== "active")
                    {
                        if($row['jobType'] == "ij")
                        {
                            $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']); 
                        }
                        else
                        {
                            $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']);
                    
                        }
                    }
                }  
            }
    }
    else
    {
        // Here if category value is different then fetch data according company and category varible value
        if($type == "all")
        {
            // fetch all jobs
            $result=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$company.' AND `jobCategory`="'.$category.'"');
            while($row=mysqli_fetch_assoc($result))
            {
                // fetch only recruiter data
                $result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row["recruiterId"].'');
                $row2=mysqli_fetch_assoc($result1);
                if($row2['accountStatus']== "active")
                {
                    if($row['jobType'] == "ij")
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']); 
                    }
                    else
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']);
                
                    }
                }
            }  
        } 
        else
        {
            $result=mysqli_query($con,'SELECT * FROM `job` WHERE `recruiterId`='.$company.' AND `jobCategory`="'.$category.'" AND `jobType`="'.$type.'"');
            while($row=mysqli_fetch_assoc($result))
            {
                // fetch only recruiter data
                $result1=mysqli_query($con,'SELECT * FROM `recruiter` WHERE `recruiterId`='.$row["recruiterId"].'');
                $row2=mysqli_fetch_assoc($result1);
                if($row2['accountStatus']== "active")
                {
                    if($row['jobType'] == "ij")
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>"Internship + Job","jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']); 
                    }
                    else
                    {
                        $records[] =array("jobId"=>$row["jobId"],"recruiterId"=>$row2["recruiterId"],"recruiterName"=>$row2["recruiterName"],"recruiterEmail"=>$row2["recruiterEmail"],"recruiterPassword"=>$row2["recruiterPassword"],"recruiterPhone"=>$row2["recruiterPhone"],"recruiterProfilepic"=>$row2["recruiterProfilepic"],"companyName"=>$row2["companyName"],"companyLogo"=>$row2["companyLogo"],"companyDescription"=>$row2["companyDescription"],"companyEmail"=>$row2["companyEmail"],"companyWebsite"=>$row2["companyWebsite"],"companyLocation"=>$row2["companyLocation"],"companyAddress"=>$row2["companyAddress"],"accountStatus"=>$row2["accountStatus"],"jobTitle"=>$row["jobTitle"],"jobType"=>$row["jobType"],"jobMode"=>$row["jobMode"],"jobCategory"=>$row["jobCategory"],"jobSalary"=>$row["jobSalary"],"lastdate"=>$row["lastdate"],"jobLocation"=>$row["jobLocation"],"jobVacancy"=>$row["jobVacancy"],"jobExperience"=>$row["jobExperience"],"jobStipend"=>$row['stipend']);
                
                    }
                }
            }  
        }
    }
    
}


echo json_encode($records);

?>