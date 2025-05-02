<?php
session_start();
if (isset($_SESSION['User-Id']) && isset($_SESSION['Registration-Id'])) {
    header("Location: ../userPages/User_Enrollees.php");
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta ssrset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login_form.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <script src="../js/registration.js"></script> 
</head>

<body>  
    <div class="main"> 

        <div class="header">
             <h2>Lucena South II Elementary School</h2>
        </div>
 
        <div id="logo-container">
            <img src="../imgs/R(1).png" 
            alt="School Logo" id="school-logo">
        </div>

        <div class = "page-title">
             <h3>Log-In</h3>
             <BR>
             <hr>
        </div>

       <div class="form-container">
            <br>
            <div class="error-msg">
                <span class="em-login"> Error Message Here </span>
            </div>
           <form action="../server_side/post_login_verify.php" method="post">
               <div class="box">
                   <BR>
                   <label for="phone_number" style="color: white;  font-family: Baloo-Thambi-2;  font-size: .8em;" > Phone Number</label>
                   <input type="text" id="phone_number" name="phone_number" placeholder="09xx xxx xxxx" required>
                   <BR>
                   <label for="password" style="color: white; margin-bottom: 2em; font-family: Baloo-Thambi-2;  font-size: .8em; ">Password</label>
                   <input type="password" id="password" name="password" placeholder="Enter password here" required>
                </div>
                <div class="wrap">
                    <button type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
        
        <p><span style="color: white;">Don't have an account?</span>
            <a href="../client_side/Registration.php" class="register-link">
                Create a New Account
            </a>
        </p>
    </div>

    <div class="vlorange"></div>
    <div class="vlyellow"></div>

    <div id="img-container">
        <img src="../imgs/student.jpg" 
        alt="student" id="student">
    </div>


</body>
</html>
