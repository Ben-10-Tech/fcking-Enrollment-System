<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="../css/user_enrollment_status.css">

    <body>
       <?php
        include './User_Base_Designs.php';
       ?> 

       <div class="main-wrapper">
            <h1> Enrollment Status</h1>
            <?php 
                include_once __DIR__ . '/../server_side/userEnrollmentStatusView.php';
                $status = new displayEnrollmentStatus();
                $status->displayStatus(); 
            ?>
            <p> Your enrollment form is currently being processed. Please wait for 3-4 working days <p>
       </div>
       <script src="../js/user-enrollment-status.js" defer></script>
    </body>
</html>