<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSIS-Admin Teacher Info</title> 
    <?php
        include '../adminPages/admin_base_designs.php';
        include_once '../server_side/adminEnrollmentAccessStatusView.php';
    ?>
    <link rel="stylesheet" href="../css/Admin_Enrollment_Access_Status.css">
</head>
<body>
    <div class="main-content">
        <div class="content">
            <div class="student-status-start">
                    <div class="header">
                        <h2>Student Enrollment Form</h2>
                    </div>
                    <div class="enrollment-info-content">
                        <h2 class="school-info">ANTAS AT IMPORMASYON NG PAARALAN</h2>
                        <table class="school-info-table">
                          <?php
                            $enrollmentStatusView = new AdminEnrollmentAccessStatus();

                            $enrollmentStatusView->schoolLevelInfo();
                          ?>
                        </table>

                        <h2 class="student-info">IMPORMASYON NG ESTUDYANTE</h2>
                        <table class="student-info-table">
                        <?php
                            $enrollmentStatusView = new AdminEnrollmentAccessStatus();

                            $enrollmentStatusView->enrolleeInfo();
                          ?>
                        </table>

                        <h2 class="disability-info">PARA SA MGA MAG-AARAL NA MAY KAPANSANAN</h2>
                        <table class="disability-info-table">
                        <?php
                            $enrollmentStatusView = new AdminEnrollmentAccessStatus();

                            $enrollmentStatusView->ifDisabled();
                          ?>
                        </table>
                        <table class="disability-info-table">
                        <?php
                            $enrollmentStatusView = new AdminEnrollmentAccessStatus();

                            $enrollmentStatusView->displayPsaImg();
                          ?>
                        </table>                          
                    </div>
                </div>
            </div>
                <div class="student">
                    <div class="status">
                        <button class="officially-enrolled">Officially Enrolled</button>
                        <button class="temporarily-enrolled">Temporarily Enrolled</button>
                        <button class="rejected">Rejected</button>
                    </div>
        </div>
    </div>