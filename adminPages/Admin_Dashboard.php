<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css"> 
    <?php
        include '../adminPages/admin_base_designs.php'; 
    ?>

        <!--START OF THE MAIN CONTENT-->
        <div class="content">
            <div class="card-container">
                <!--Enrolled-->
                <div class="card card-1">
                    <div class="card-image border-50">
                        <img src="../imgs/enrolled.png" alt="">
                        <p class="card-text">Enrolled</p>   
                    </div>
                    <div class="number-div">
                        <p class="number">
                            <?php
                                include_once '../server_side/DashboardView.php';
                                $dashboard = new DashboardView();
                                $dashboard->displayEnrolledStudents();
                            ?>
                        </p>
                    </div>
                </div>
                <!--Pending Enrollees-->
                <div class="card card-2">
                    <div class="card-image border-50">
                        <img src="../imgs/pending.png" alt="">
                        <p class="card-text">Pending Enrollees</p>   
                    </div>
                    <div class="number-div">
                        <p class="number">
                            <?php
                                include_once '../server_side/DashboardView.php';
                                $dashboard = new DashboardView();
                                $dashboard->displayPendingStudents();
                            ?>
                        </p>
                    </div>
                </div>
                <!--To Follow Up-->
                <div class="card card-3">
                    <div class="card-image border-50">
                        <img src="../imgs/follow.png" alt="">
                        <p class="card-text">To Follow-up</p>   
                    </div>
                    <div class="number-div">
                        <p class="number">
                            <?php
                                include_once '../server_side/DashboardView.php';
                                $dashboard = new DashboardView();
                                $dashboard->displayToFollowStudents();
                            ?>
                        </p>
                    </div>
                </div>
                <!--Early Registration-->
                <div class="card card-4">
                    <div class="card-image border-50">
                        <img src="../imgs/Early.png" alt="">
                        <p class="card-text">Temporarily Enrolled</p>   
                    </div>
                    <div class="number-div">
                        <p class="number">
                            <?php
                                include_once '../server_side/DashboardView.php';
                                $dashboard = new DashboardView();
                                $dashboard->displayTemporarilyEnrolledStudents();
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="big-card-wrapper">
                <!--PENDING ENROLLMENTS BIG-->
                <div class="pending-enrollments-wrapper">
                    <h3 class="big-card-title">Pending Enrollees</h3>
                    <table class="pending-enrollments-table">
                        <tr>
                            <th>LRN</th>
                            <th>Name</th>
                            <th>Level</th>
                        </tr>
                        <?php
                            include_once '../server_side/DashboardView.php';
                            $dashboard = new DashboardView();
                            $dashboard->displayPendingEnrolleesInformation();
                        ?>
                    </table>
                </div>
                <!--Post Announcments BIG-->
                <div class="post-announcement-wrapper">
                    <div class="big-card-header">
                        <h3 class="big-card-title post-announcements-title">
                            Post Announcements
                        </h3>
                        <button class="edit-btn">
                            Edit
                        </button>
                    </div>
                    <div class="img-container">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    