<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Recruiter Login Page</title>
        <link rel="stylesheet" type=text/css href="css/style.css">

        <style>
            .form_box{
                width: 450px;
                min-height: 50vh;
          /* background-color: red; */
          margin: auto;
          margin-top: -300px;
          padding-top: 30px;
            }
            *{
        margin: 0%;
        padding: 0%;
    }

    .col1{
        width: 70%;
        height: 40px;
        margin: auto;
        margin-top: -45px;
        background-color: rgba(0, 0, 0, 0.507);
        padding: 2px 10px;
        border-radius: 50px;
        display:grid;
        text-align: left;
        
    }

    .h3{
        padding-top: 10px;
        margin-top: 150px;
        text-align: center;
        color:white;
        /* font-size: 14px; */
        font-family:'Times New Roman', Times, serif

    }
h3{
    color:white;
    text-align: center;
    font-family: 'Times New Roman', Times, serif;
    margin-bottom: 10px;

}
    .btn{
        padding: 10px 70px;
        text-align: center;
        border-radius: 20px;
        border: rgba(72, 127, 245, 0.91);
        background-color: rgba(72, 127, 245, 0.91);
        color: white;
        cursor: pointer;
    }
    .i1{
        width: 60%;
        background-color: transparent;
        border: 0px;
          
    }
    .pr1{
        width: 30px;
        height: auto;
        margin-left: 90px;
    }


    h2{
    margin: -50px;
    margin-top: -30px;
    padding-left: 180px;
    text-align: left;
    font-size: 22px;
    top: 5px;
    color: #fff;
}
.col2{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 0px;
}
.row2 input {
        margin: 7px 0px;
        width: 220px;
        height: 25px;
        border: none;
        color: white;
        background-color: transparent;
        font-size: large;
        cursor: pointer;
        outline: none;
        padding-left: 20px;
    }

</style>
    </head>
    <body>
        <h1>Welcome To</h1>
        <h1>Campus Recruitment Management System</h1>
        <div class="recruiter-login">
            <img src="img/i4.png" class="pr1">
            <h2>Forgot Your Password</h2>
        <div class="h3" > </div> 
             <h3>Enter your email to reset your password</h3>
           
            <form method="post" action="./php/sendMail.php">
               <div class="form_box">  
                </div>
                <div class="col1">
                    <div class="row1"></div>
                    <div class="row2"><input class="i1" type="email" placeholder="Email" name="email" required></div>
                </div>
                <div class="col2" >
                    <input class="btn" type="submit" name="send_otp" value="Next">
                   </div>
            </form>

        </body>
        </html>    