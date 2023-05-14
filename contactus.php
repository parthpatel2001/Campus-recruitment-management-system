<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- <link rel="stylesheet" type=text/css href="style.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/b4b61fdd45.js" crossorigin="anonymous"></script>
</head>
<style>
    * {
        padding: 0%;
        margin: 0%
    }

    .logo {
        width: 7%;
        height: auto;
        padding: 20px 30px;
    }

    .right-navbar {
        width: 35%;
        float: right;
        padding: 15px;
    }

    .right-navbar a {
        float: left;
        display: block;
        color: black;
        text-align: right;
        /* padding: 25px 30px; */
        padding-top: 18px;
        padding-left: 55px;
        padding-right: 10px;
        text-decoration: none;
        font-size: 17px;
        transition: 0.5s;
    }

    .contactus {
        margin-top:9px;
        width: 50px;
        height: auto;
        text-align: center;
        margin-left: 100px;
    }

    h1 {
        width: 90%;
        height: 50%;
        padding-top: 30px;
        padding-bottom: 5px;
        padding-right: 20px;
        padding-left: 20px;
        /* padding: 50px 20px; */
        margin-top: 10px;
        margin-left: 50px;
        text-align: center;
    }

    h2 {
        width: 100%;
        /* position: absolute; */
        margin-top: 5px;
        padding: 5px 5px;
        padding-bottom: 30px;
        text-align: center;
        font-size: 12px;

    }


    .section-2 {
        background: url(img/i12.jpg);
        background-size: cover;
        width: 100%;
        height: 550px;
        padding-top: 150px;
    }

    .pg {
        width: 50%;
        height: 50vh;
        background: rgba(252, 250, 250, 0.932);
        transform: translate(0%, 12%);
        box-sizing: border-box;
        border-radius: 20px;
        margin: auto;
        padding: 40px 40px;
    }

    .col1 {
        width: 100%;
        height: 40px;
        border-bottom: 1px solid black;
        margin-bottom: 20px;
        display: flex;
    }

    .r1 {
        width: 40px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .r1 i {
        font-size: 24px;
    }

    .input-field {
        width: 100%;
        padding-top: 10px;
        padding-left: 10px;
        font-size: 18px;
        outline: none;
        background-color: transparent;
        border: 0px;

    }

    .r2 {
        flex: 9;
        height: 100%;

    }


    .row2 input {
        width: 100%;
    }

    .row2 input[type="text"] {
        border: none;
        border-bottom: 1px solid #4b4747;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;

    }

    .row2 i {
        width: 20%;
    }

    .col2 {
        width: 80%;
        height: 40px;
        margin: auto;
        margin-top: 20px;
        /* background-color: rgba(0, 0, 0, 0.507); */
        padding: 2px 10px;
        display: grid;
        text-align: left;
        box-sizing: border-box;
        /* border-bottom: 1px solid #fff; */
    }

    .col3 {
        width: 80%;
        height: 40px;
        margin: auto;
        margin-top: 50px;
        /* background-color: rgba(0, 0, 0, 0.507); */
        padding: 2px 10px;
        display: grid;
        text-align: left;
    }

    .Submit {
        width: 50px;
        height: 50%;
        margin-left: 220px;
        margin-top: 140px;

    }

    .btn {
        padding: 10px 17px;
        text-align: center;
        border-radius: 30px;
        border: 1px solid rgba(72, 127, 245, 0.91);
        background-color: rgba(72, 127, 245, 0.91);
        color: white;
    }
    .btn1
    {
        padding: 8px 30px;
        border-radius: 20px;
        border: 0px;
        color: white;
        background-color: rgba(72, 127, 245, 0.91);
        font-size: 20px;
    }

    
    .input-field::placeholder{
        padding-left: 0px;
    }

    .section-1 {
        width: 100%;
        height: auto;
        background-image: linear-gradient(rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.5)), url('img/i11.jpg');
        background-size: 100% auto;
        color: white;
        background-repeat: no-repeat;
        /* display: flex;
            justify-content: center;
            align-items: center; */
        text-align: center;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .row1 {
        width: 50%;
        height: auto;
        margin: auto;
        display: flex;
        justify-content: space-evenly;
    }

    .icon {
        width: 9%;
        height: 9vh;
        background-color: #50B6F0;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon i {
        font-size: 24px;
    }

    .i15{
        width: 50px;
        height: 10px;
    }
</style>
<!-- <style>

        *{
            margin: 0%;
            padding: 0%;
        }
        .form_box{
            width: 450px;
            min-height: 50vh;
            /* background-color: red; */
            margin: auto;
            margin-top: 100px;
            padding-top: 20px;
          
        }

        /* *{
        margin: 0%;
        padding: 0%;
        }  */
        .section-1
        {
        width: 9%;
        height: 40vh;
        margin-top: 10px;
        margin-left: 20px;
        background-image: url('./images/logo.png');
        background-repeat : no-repeat;
        background-size:100%;
        text-align: center;

        }

        .contact us{
            margin-top: 100px;
            padding: auto;
            text-align: center;
        }
        

        
    </style> -->

<body>

    <div class="navbar">
        <img src="img/logo.png" alt="Website Logo" class="logo">
        <div class="right-navbar">
            <a href="home.php">Home</a>
            <a href="aboutus.php">About</a>
            <a href="contactus.php">Contact</a>
        </div>
    </div>

    <h1>Contact Us</h1>
    <h2>Feel free to contact us any time, we will get back to you as soon as we can!</h2>
    <div class="section-1">
        <div class="row1">

            <div class="icon">
                <i class="fa-solid fa-phone"></i>
                <!-- <i class="fa-sharp fa-regular fa-envelope"></i> -->
            </div>
            <div class="icon">
                <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="icon">
                <i class="fa-brands fa-linkedin-in"></i>
            </div>
            <div class="icon">
                <i class="fa-brands fa-facebook-f"></i>
            </div>
            <div class="icon">
                <i class="fa-sharp fa-solid fa-location-dot"></i>
            </div>
        </div>
        <p style="padding-top: 20px;">Connect through social media </p>
    </div>
    <div class="section-2">
        <!-- <img src="images/i12.jpg" alt="" class="i12"> -->
        <form action="./php/Feedback.php" method="post">
            <div class="pg">
                <div class="col1">
                    <div class="r1">
                        <i class="fa-solid fa-user"></i>
                        <!-- <i class="images/i15.png"></i>                     -->
                    </div>
                    <div class="r2">
                        <input type="text" name="name" placeholder="Name" class="input-field" required>
                    </div>
                </div>
                <div class="col1">
                    <div class="r1">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="r2">
                        <input type="email" name="email" placeholder="Email" class="input-field" required>
                    </div>
                </div>
                <div class="col1">
                    <div class="r1">
                        <i class="fa-regular fa-message"></i>                   
                    </div>
                    <div class="r2">
                        <input type="text" name="msg" placeholder="Message" class="input-field" required>
                    </div>
                </div>
                <div style="text-align:center; padding-top: 20px;">
                
                <button class="btn" name="submit" value="submit">Submit</button>
                    </div>

                <!-- <div class="col1">
                    <div class="row1"> </div>
                    <div class="row2">
                        <i class='fas fa-portrait' style='font-size:24px'></i>            
                    </div>
                    <div class="row2"><input class="name" type="text" placeholder="Name" name="Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="row1"> </div>
                    <div cla ss="row2"><input class="Email" type="text" placeholder="Email" name="Email"></div>
                </div>
                <div class="col3">
                    <div class="row1"> </div>
                    <div class="row2"><input class="Message" type="text" placeholder="Message" name="Message"></div>
                </div>

                <div class="Submit">
                    <input class="btn" type="text" value="Submit">
                </div> -->
            </div>
        </form>

        <!--<div class="section-1">
            </div>-->

               <!-- Design custom footer -->
      
    
</html>