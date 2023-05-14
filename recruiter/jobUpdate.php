<?php
include './../dbconnect.php';
session_start();
$jobId=$_GET['jobId'];
$recruiter=$_SESSION['recruiterId'];
$result=mysqli_query($con,"SELECT * FROM `job` WHERE `jobId`='$jobId' AND `recruiterId`='$recruiter'");
$row=mysqli_fetch_assoc($result);
// echo $row['recruiterId'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update a Job</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<style>
body {
    margin: 0;
    padding: 0;
    background-size: cover;
    background: url(img/bg4.jpg);
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

h1 {
    margin: 0px;
    padding-left: 50px;
    padding-top: 20px;
    font-family: Arial, Helvetica, sans-serif;
}

.recruiter-job {
    width: 90%;
    margin: auto;
    margin-top: 35px;
    height: 90vh;
    background-color: rgba(0, 0, 0, .5);
    color: #fff;
}

.recruiter-form {
    margin: auto;
    margin-top: 30px;
    width: 92%;
    height: 70vh;
}

.row-1 {
    width: 100%;
    min-height: 30px;
    display: flex;

}

.row-2 {
    padding-top: 20px;
    width: 98%;
    min-height: 30px;
    display: flex;
    margin: auto;
}

.col-1 {
    width: 50%;
    height: 45vh;
    padding-left: 10px;
    padding-right: 10px;
}

.col-1 input {
    border: none;
    border-bottom: 1px solid #fffbfb;
    background: transparent;
    outline: none;
    height: 50px;
    text-indent: 20px;
    color: #fcfbfb;
    font-size: 16px;
    width: 96%;
    padding-left: 15px;
    margin-left: 2px;
    margin-bottom: 20px;
}

.col-1 i {
    top: auto;
    padding-left: 15px;
    padding-top: 20px;
}

.input {
    height: 45vh;
}

::placeholder {
    color: rgb(255, 255, 255);
    opacity: 2;
    padding-left: 1px;
}

.input i {
    position: absolute;
    top: auto;
}

.input input {
    border: none;
    border-bottom: 1px solid #fffbfb;
    background: transparent;
    outline: none;
    height: 50px;
    text-indent: 39px;
    color: #fcfbfb;
    font-size: 16px;
    width: 98%;
}

select {
    color: rgb(255, 255, 255);
    opacity: 2;
    padding-left: 40px;
}

#select-type {
    border: none;
    border-bottom: 1px solid #fffbfb;
    background: transparent;
    outline: none;
    text-indent: 10px;
    height: 53px;
    color: #fcfbfb;
    font-size: 16px;
    width: 100%;
    margin-bottom: 20px;
}

#category {
    border: none;
    border-bottom: 1px solid #fffbfb;
    background: transparent;
    outline: none;
    text-indent: 10px;
    height: 53px;
    color: #fcfbfb;
    font-size: 16px;
    width: 100%;
    margin-bottom: 20px;
}

#icon {
    position: absolute;
}

option {
    background-color: rgb(182, 141, 141);
}

optgroup {
    color: black;
    background-color: aqua;
}

.input1 {
    width: 100%;
    height: 5vh;
    /* background-color: aqua; */
    border-bottom: 1px solid white;
    display: flex;
}

.input2 {
    width: 100%;
}

.sect-1 {
    width: 3%;
    height: auto;
    /* background-color: yellow; */
    padding-top: 10px;
    padding-left: 10px;
}

.sect-2 {
    width: 97%;
    height: auto;
    /* background-color: rgb(0, 81, 255); */
}

.sect-2 input {
    width: 99.2%;
    border: none;
    background: transparent;
    outline: none;
    height: 33px;
    text-indent: 9px;
    color: #fcfbfb;
    font-size: 16px;
    padding: 0px;
}

.sect-4 input[type="submit"] {
    border: none;
    outline: none;
    width: 10%;
    height: 35px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 15px;
    position: absolute;
    bottom: 60px;
    right: 120px;
}

#detail {
    border: none;
    border-bottom: 1px solid #fffbfb;
    background: transparent;
    text-indent: 10px;
    outline: none;
    height: 20px;
    color: #fcfbfb;
    font-size: 16px;
    width: 100%;
    margin-bottom: 25px;

}
</style>

<body>

    <div class="recruiter-job">

        <h1><u>UPDATE JOB</u></h1>

        <div class="recruiter-form">
            <form action="./php/updateJob.php" method="post">
                <div class="row-1">
                    <div class="col-1">
                        <div class="input">

                        <!-- Set job Id -->
                        <input type="text" name="jobId" placeholder="Title" style="display: none;" value="<?php echo $row['jobId'];?>" required>

                            <!-- Take Job title -->
                            <i class="fa-solid fa-user-tie"></i>
                            <input type="text" name="title" placeholder="Title" value="<?php echo $row['jobTitle'];?>" onkeydown="return /[a-zA-Z \-]/i.test(event.key)"
                                required>

                            <!-- Take a type or bond of job -->
                            <i class="fa-solid fa-draw-polygon"></i>
                            <select name="type" id="select-type" required>
                                <?php 
                                if($row['jobType'] == "Only Internship")
                                {
                                    echo '
                                    <option value="Only Internship" selected>Internship</option>
                                    <option value="ij" >Internship + Job</option>
                                    <option value="Only Job">Job</option>';
                                }
                                elseif($row['jobType'] == "ij")
                                {
                                    echo '
                                    <option value="internship-job" selected>Internship + Job</option>
                                    <option value="ij">Internship</option>
                                    <option value="Only Job">Job</option>';
                                }
                                else
                                {
                                    echo'
                                    <option value="Only Job" selected>Job</option>
                                    <option value="Only Internship">Internship</option>
                                    <option value="ij">Internship + Job</option>
                                    ';
                                }
                                ?>

                              

                            </select>

                             <!-- take a Stipend -->
                             <i class="fa-sharp fa-solid fa-money-check"></i>
                            <input type="number" name="stipend" list="stipendlist" value="<?php echo $row['stipend']; ?>" placeholder="Stipend" id="stipend" required>
                            <datalist id="stipendlist">
                                <option >1000</option>
                                <option >2000</option>
                                <option >3000</option>
                                <option >4000</option>
                                <option >5000</option>
                            </datalist>

                            <!--  Package -->
                            <i class="fa-sharp fa-solid fa-money-check"></i>
                            <input type="number" name="salary" value="<?php echo $row['jobSalary'];?>" placeholder="Salary" id="salary" required>

                            <!-- work mode -->
                            <i class="fa-solid fa-house-laptop"></i>
                            <input type="text" name="workMode" placeholder="Job Mode" value="<?php echo $row['jobMode']; ?>" id="workMode" onkeydown="return /[a-zA-Z \-]/i.test(event.key)"  list="work" required>
                            <datalist id="work">
                                <option>Work From Home</option>
                                <option>Office</option>
                            </datalist>
                         
                        </div>
                    </div>


                    <div class="col-1">
                        <div class="input">
                            <!-- take a vacancy -->
                            <i class="fa-solid fa-v" id="icon"></i>
                            <input type="number" name="vacancy" value="<?php echo $row['jobVacancy']; ?>" placeholder="Vacancy" required>
                            <!-- Take Exprience -->
                            <i class="fa-sharp fa-solid fa-briefcase" id="icon"></i>
                            <input type="text" placeholder="Exprience" value="<?php echo $row['jobExperience']; ?>" name="exprience" list="expriencelist" required>
                            <datalist id="expriencelist">
                                <option>Fresher</option>
                                <option>1-2 year Experiences</option>
                                <option>More than 2 year Experience</option>
                            </datalist>

                            <!-- take last day apply -->
                            <i class="fa-solid fa-calendar" id="icon"></i>
                            <input placeholder="Last date for Apply" value="<?php echo date('d-m-Y',strtotime($row["lastdate"]))?>" type="text" name="lastdate" onfocus="(this.type = 'date')"
                                id="date" required>

                                   <!-- Select a job category -->
                            <i class="fa-solid fa-draw-polygon"></i>
                            <select name="category" id="category">
                            <option value="<?php echo $row['jobCategory']; ?>"selected><?php echo $row['jobCategory']; ?></option>
                                <optgroup label="Network and system administration job titles">
                                    <option value="Computer systems manager">Computer systems manager</option>
                                    <option value="Network architect">Network architect</option>
                                    <option value="Systems analyst">Systems analyst</option>
                                    <option value="IT coordinator">IT coordinator</option>
                                    <option value="Network administrator">Network administrator</option>
                                    <option value="Service desk analyst">Service desk analyst</option>
                                    <option value="System administrator ">System administrator
                                        (also known as admin)</option>
                                    <option value="Wireless network engineer">Wireless network engineer</option>
                                </optgroup>

                                <optgroup label="Database administration job titles">
                                    <option value="Database administrator">Database administrator</option>
                                    <option value="Database analyst">Database analyst</option>
                                    <option value="Data quality manager">Data quality manager</option>
                                    <option value="Database report writer">Database report writer</option>
                                    <option value="SQL datavase administrator">SQL datavase administrator</option>
                                </optgroup>

                                <optgroup label="Business analyst and business intellligence job titles">
                                    <option value="Big data engineer/architech">Big data engineer/architech</option>
                                    <option value="Business intelligence specialist/analyst">Business intelligence
                                        specialist/analyst</option>
                                    <option value="Business systems analyst">Business systems analyst</option>
                                    <option value="Data analyst">Data analyst</option>
                                    <option value="Data analytics developer">Data analytics developer</option>
                                    <option value="Data modelling analyst">Data modelling analyst</option>
                                    <option value="Data scientist">Data scientist</option>
                                    <option value="Data warehouse manager">Data warehouse manager</option>
                                    <option value="Data warehouse programing specialist">Data warehouse programing
                                        specialist</option>
                                    <option value="Intelligence specialist">Intelligence specialist</option>
                                </optgroup>

                                <optgroup label="Software development, DevOps and cloud job titles">
                                    <option value="Back-end developer">Back-end developer</option>
                                    <option value="Cloud/Software architech">Cloud/Software architech</option>
                                    <option value="Cloud/Software developer">Cloud/Software developer</option>
                                    <option value="Cloud/Software application engineer">Cloud/Software application
                                        engineer</option>
                                    <option value="Cloud sysstem administrator">Cloud sysstem administrator</option>
                                    <option value="Cloud system engineer">Cloud system engineer</option>
                                    <option value="DevOps engineer">DevOps engineer</option>
                                    <option value="Front-end developer">Front-end developer</option>
                                    <option value="Full-stack developer">Full-stack developer</option>
                                    <option value="Java developer">Java developer</option>
                                    <option value="Platform engineer">Platform engineer</option>
                                    <option value="Release manager">Release manager</option>
                                    <option value="Reliability engineer">Reliability engineer</option>
                                    <option value="Software engineer">Software engineer</option>
                                    <option value="Software quality assurance analyst">Software quality assurance
                                        analyst</option>
                                    <option value="UI(User Interface) designer">UI(User Interface) designer</option>
                                    <option value="UX(User Experience) designer">UX(User Experience) designer</option>
                                    <option value="Web developer">Web developer</option>
                                </optgroup>

                                <optgroup label="Security job titles">
                                    <option value="Application security administrator">Application security
                                        administrator</option>
                                    <option value="Arificial intelligence security specialist">Arificial intelligence
                                        security specialist</option>
                                    <option value="Cloud security specialist">Cloud security specialist</option>
                                    <option value="Cyber security hardware engineer">Cyber security hardware engineer
                                    </option>
                                    <option id="Cyber intelligence specialist">Cyber intelligence specialist</option>
                                    <option id="Cryptographer">Cryptographer</option>
                                    <option id="Data privacy officer">Data privacy officer</option>
                                    <option id="Digital forensics analyst">Digital forensics analyst</option>
                                    <option id="It security engineer">It security engineer</option>
                                    <option id="Information assurance analyst">Information assurance analyst</option>
                                    <option id="Security systems administrator">Security systems administrator</option>
                                </optgroup>

                                <optgroup label="Help desk and  customer support job titles">
                                    <option value="Help desk support specialist">Help desk support specialist</option>
                                    <option value="IT support specialist">IT support specialist</option>
                                    <option value="Customer Service representative">Customer Service representative
                                    </option>
                                </optgroup>

                                <optgroup label="Project and product management job titles">
                                    <option value="Technical product manager">Technical product manager</option>
                                    <option value="Product manager">Product manager</option>
                                    <option value="Project manager">Project manager</option>
                                    <option value="Program manager">Program manager</option>
                                    <option value="Porfolio manager">Porfolio manager</option>
                                </optgroup>
                            </select>
                            
                            <!-- take  Location -->
                            <i class="fa-solid fa-location-dot" id="icon"></i>
                            <input type="text" list="Location" placeholder="Location" value="<?php echo $row['jobLocation']; ?>" name="location"  id="location" required />
                            <datalist id="Location">
                                <option>Ahmedabad</option>
                                <option>Gandhinagr</option>
                                <option>Vadodra</option>
                                <option>Bangalore</option>
                                <option>Chandirgarh</option>
                                <option>Chennai</option>
                                <option>Hyderabad</option>
                                <option>Mumbai</option>
                                <option>Delhi</option>
                                <option>Mehsana</option>
                                <option>Noida</option>
                                <option>Gurgaon</option>
                                <option>Kolkata</option>
                                <option>Pune</option>
                                <option>Agra</option>
                                <option>Ajmer</option>
                                <option>Palanpur</option>
                                <option>Aliagarh</option>
                                <option>Allahabad</option>
                                <option>Kalol</option>
                                <option>Himmatnagar</option>
                                <option>Rajkot</option>
                                <option>Patan</option>
                                <option>Jaipur</option>
                                <option>Sangli</option>
                                <option>Nasik</option>
                                <option>Indore</option>
                                <option>Anand</option>
                                <option>Junagarh</option>
                                <option>Valsad</option>

                            </datalist>

                           

                        </div>
                    </div>
                </div>

                <div class="row-2">
                </div>
                <div class="row-2">
                    <div class="input2">
                        <div class="sect-3">
                            <a href="rjob.php"><i class="fa-solid fa-arrow-left"></i>Back to Job Page</a>
                        </div>
                        <div class="sect-4">
                            <input type="submit" name="submit" value="Update">
                        </div>
                    </div>
                </div>

        </div>
        </form>


        
</body>

</html>