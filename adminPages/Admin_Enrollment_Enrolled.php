<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSIS-Admin Enrollment Access</title>
    <link rel="stylesheet" href="../css/Admin_Enrollment_Pending.css">
    <link rel="stylesheet" href="../css/admin_base_designs.css">
    <?php 
        include_once './admin_base_designs.php';
        require_once __DIR__ . '/../server_side/adminEnrolledView.php';
    ?>
<body>
    <div class="main-content">
        <div class="content">
            <div class="enrollment-start">
                <div class="enrollment-access">
                    <div class="header">
                        <div class="header-left">
                            <h2> Enrolled </h2>
                        </div>
                        <div class="header-right">
                            <?php
                            $enrollmentStatusView = new adminEnrolledView();
                            $enrollmentStatusView->displayCount();
                            ?>
                        </div>
                    </div>
                    <div class="menu-content">
                        <table class="enrollments">
                            <tr>
                                <th>Student LRN</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Guardian Name</th>
                                <th>Guardian Contact</th>
                                <th> Display Enrollment Information</th>
                            </tr>
                                <?php      
                                $enrollmentStatusView = new adminEnrolledView();
                                $enrollmentStatusView->displayEnrolled();
                                ?>
                        </table>
                    </div>
                    <div id="enrolleeModal" class="modal">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <script src="../js/enrollee-popUp.js" defer></script>
</body>    
</html>