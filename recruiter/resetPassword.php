
<!DOCTYPE html>
<html>

<head>
    <title>Recruiter Login Page</title>
    <link rel="stylesheet" type=text/css href="css/style.css">
</head>
<style>
    .form_box {
        width: 450px;
        min-height: 50vh;
        /* background-color: red; */
        margin: auto;
        margin-top: 110px;
        padding-top: 20px;
    }

    * {
        margin: 0%;
        padding: 0%;
    }

    h2 {
        margin: -50px;
        margin-top: -35px;
        padding-left: 220px;
        text-align: left;
        font-size: 22px;
        top: 5px;
        color: #fff;
    }

    h3 {
        margin-top: 120px;
        margin-left: 80px;
        font-size: 18px;

    }

    .col1 {
        width: 90%;
        height: 40px;
        margin: auto;
        margin-bottom: 20px;
        background-color: rgba(0, 0, 0, 0.507);
        padding: 2px 10px;
        border-radius: 50px;
        display: flex;
    }

    .row1 {
        width: 10px;
        height: auto;
        margin-right: 15px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .row1 img {
        width: 30px;
        height: auto;
        margin: auto;
        padding-left: 760px;

    }

    .row2 input[type="text"],
    input[type="password"] {
        margin: 7px 0px;
        width: 220px;
        height: 25px;
        border: none;
        color: white;
        background-color: transparent;
        font-size: large;
        cursor: pointer;
        outline: none;
        transition: all 0.5s ease;
    }

    .col2 {
        width: 90%;
        height: 40px;
        margin: auto;
        margin-bottom: 20px;
        background-color: rgba(0, 0, 0, 0.507);
        padding: 2px 10px;
        border-radius: 50px;
        display: flex;

    }

    .col3 {
        /* width: 90px; */
        /* height: auto; */
        padding-left: 140px;
    }

    .btn {
        width: 50%;
        margin: auto;
        padding: 10px 17px;
        text-align: center;
        border-radius: 30px;
        border: 1px solid rgba(72, 127, 245, 0.91);
        background-color: rgba(72, 127, 245, 0.91);
        color: white;

    }

    .pr1 {
        width: 35px;
        height: auto;
        margin-left: 120px;
        margin-top: 0;
    }

    h4 {
        margin: auto;
        margin-top: 50px;
        margin-left: 80px;
        font-size: 18px;
    }

    h5 {
        margin-top: 90px;
        margin-left: 80px;
        font-size: 18px;
    }
</style>

<body>
    <h1>Welcome To</h1>
    <h1>Campus Recruitment Management System</h1>
    <div class="recruiter-login">
        <img src="img/i9.png" class="pr1">
        <h2>Reset Your Password</h2>
        <!-- <h3>OTP</h3>
        <h4>Password</h4>
        <h5>Confirm Password</h5> -->
        <style>
            .label {
                padding-left: 40px;
                margin-top: 100px;
            }
        </style>


        <div class="form_box">

            <label class="label" for="otp">OTP</label>
            <div class="col1">
                <div class="row1"> </div>
                <div class="row2"><input type="text" id="otp" placeholder="Enter OTP"></div>
            </div>
            <label class="label" for="otp">New Password</label>
            <div class="col1" style="margin-top: 0px;">
                <div class="row1"> <img src="img/i3.png" alt=""> </div>
                <div class="row2"><input type="password" id="password" placeholder="Password"></div>
            </div>
            <label class="label" for="otp">Confirm Password</label>
            <div class="col2">
                <div class="row1"> <img src="img/i3.png" alt=""> </div>
                <div class="row2"><input type="password" id="cpassword" placeholder="Confirm Password"></div>
            </div>
            <div class="col4">
                <p style="margin-bottom: 10px; color:red; display: none;" id="errorMsg">Input Field is empty</p>
            </div>
            <style>
                .col4 {
                    padding-left: 30px;
                    color: white;
                }
            </style>
            <div class="col4">
                <input type="checkbox" id="showPassword" onclick="Toggle1()"> Show Password
            </div>


            <div class="col3">
                <button class="btn" onclick="updatePassword()">Reset Password</button>
            </div>


            <script>
                // Global Variable
                var obj;
                // Change the type of input to password or text
                function Toggle1() {
                    var temp = document.getElementById("password");
                    var cpass = document.getElementById("cpassword");
                    if (temp.type === "password") {
                        temp.type = "text";
                        cpass.type = "text";
                    } else {
                        temp.type = "password";
                        cpass.type = "password";
                    }
                }

                function updatePassword() {
                    var OTP = document.getElementById('otp').value;
                    var pass = document.getElementById('password').value;
                    var cpass = document.getElementById('cpassword').value;
                    var errorMsg = document.getElementById('errorMsg');

                    var data="otp="+OTP+"&pass="+pass;

                    if (OTP == "" || pass == "" || cpass == "") {
                        errorMsg.innerHTML = "Input Field is empty...!!";
                        errorMsg.style.display = "block";
                    } else if (OTP.length != 6) {
                        errorMsg.innerHTML = "Please Enter 6 digits in OTP field..";
                        errorMsg.style.display = "block";
                    } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/.test(pass)) {
                        errorMsg.innerHTML = "Please make a Strong Password.. (at least use one uppercase character , one lowercase character ,one number ,one special character in password";
                        errorMsg.style.display = "block";
                    } else if (pass != cpass) {

                        errorMsg.innerHTML = "Password and Confirm password are not same...!!";
                        errorMsg.style.display = "block";
                    }else if(!/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/.test(pass))
        {
            errorMsg.innerHTML = "Please make a Strong Password.. (at least use one uppercase character , one lowercase character ,one number ,one special character in password)";
            errorMsg.style.display = "block";
        } else {

                        errorMsg.style.display = "none";
                        var XRH = new XMLHttpRequest();
                        XRH.onload = function() {
                            obj = JSON.parse(this.response);
                            console.log(obj);
                            if(obj.status)
                            {
                                if(confirm(obj.message))
                                {
                                window.location.href="recruiterLogin.php";
                                }
                                else
                                {
                                window.location.href="recruiterLogin.php";
                                }
                            }
                            else
                            {
                                alert(obj.message);
                            }
                        }

                        XRH.open('POST', './php/resetPassword.php');
                        XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        XRH.send(data);
                    }
                }
            </script>
</body>

</html>