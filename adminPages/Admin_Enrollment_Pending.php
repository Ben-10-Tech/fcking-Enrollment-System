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
    ?>
<body>
    <div class="main-content">
        <div class="content">
            <div class="enrollment-start">
                <div class="enrollment-access">
                    <div class="header">
                        <div class="header-left">
                            <h2> Pending Enrollments </h2>
                        </div>
                        <div class="header-right">
                            <input type=text id="search" placeholder="search enrollee name...">
                        </div>
                    </div>
                    <div class="menu-content">
                        <table class="enrollments">
                            <tr>
                                <th>Student LRN</th>
                                <th>Student Name</th>
                                <th> Age </th>
                                <th> Birthdate </th>
                                <th> Biological Sex </th>
                                <th>Enrollment Form Status</th>
                                <th> Display Enrollment Information</th>
                            </tr>
                            <tbody id="query-table"> 
                                <?php      
                                require_once __DIR__ . '/../server_side/enrollmentStatusView.php';
                                $enrollmentStatusView = new AdminEnrollmentStatusView();
                                $enrollmentStatusView->displayEnrollees();
                                ?>
                            </tbody>
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
    <script src="../js/searchPendingEnrollees.js" defer></script>
</body>    
</html>