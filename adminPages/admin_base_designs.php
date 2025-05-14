<?php
session_start();
require_once __DIR__ . '/../server_side/UserTypeView.php';
if (!isset($_SESSION['Admin']['User-Id']) || !isset($_SESSION['Admin']['Staff-Id'])) {
    header("Location: ../client_side/admin_login_form.php");
    exit();
}
?>

    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/admin_base_designs.css">
    <link rel="stylesheet" href="../css/reset.css">
    <script src="../js/admin-base-designs.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="sidebar-title">
                <span class="SSIS">SSIS</span>
                <button class="menu-btn" onclick="menu()"><img src="../imgs/bar.svg" class="menu-btn"></button>
            </div>

            <div class="menu-wrappper">
                <!--DASHBOARD-->
                <div class="menu border-100sb" id="dashboard">
                    <img src="../imgs/easel.svg" class="bi">
                    <span id="dashboard-spn" class="menu-title">
                        <a href="./Admin_Dashboard.php">Dashboard</a>
                    </span>
                </div>

                <!--STUDENTS-->
                <div class="menu border-100sb" id="students">
                    <img src="../imgs/student.svg" class="bi">
                    <span id="students-spn" class="menu-title">Students</span>
                    <button class="students-btn" onclick="studentsDrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="students-ul">
                        <li>
                            <a href="./Admin_All_Students.php" class="allStudents">All Students</a>
                        </li>
                        <li>
                            <a href="../client_side/Admin_Students.php" class="studentInfo">Student</a>
                        </li>
                    </ul>
                </div>

                <!--TEACHERS-->
                <div class="menu border-100sb" id="teachers">
                    <img src="../imgs/teachers.svg" class="bi">
                    <span id="teachers-spn" class="menu-title">Teachers</span>
                    <button class="teachers-btn" onclick="teachersDrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="teachers-ul">
                        <li>
                            <a href="../client_side/Admin_All_Teachers.php" class="allTeachers">All Teachers</a>
                        </li>
                        <li>
                            <a href="../client_side/Admin_Teachers.php" class="teachers">Teachers</a>
                        </li>
                    </ul>
                </div>

                <!--ENROLLS-->
                <div class="menu border-100sb" id="enrolls">
                    <img src="../imgs/enrolls.svg" class="bi">
                    <span id="enrolls-spn" class="menu-title">Enrolls</span>
                    <button class="enrolls-btn" onclick="enrollsDrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="enrolls-ul">
                        <li>
                            <a href="./Admin_Enrollment_Enrolled.php" class="enrolled">Enrolled</a>
                        </li>
                        <li>
                            <a href="./Admin_Enrollment_Pending.php" class="pending">Pending</a>
                        </li>
                        <li>
                            <a href="" class="toFollow">To Follow-up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <!--HEADER-->
        <div class="header-wrapper">
            <div class="header-title">
                <p class="header-title">
                    Welcome to South II Student Information System
                </p>
            </div>

            <!-- Searchbar function if kakayanin -->
            <!--         
            <div class="searchbox-wrapper">
                <input type="search" name="" id="" class="searchbox" placeholder="Search here..">
            </div> -->
            

            <div class="account">
                <div class="account-settings-wrapper">
                    <?php 
                        if (isset($_SESSION['Admin']['First-Name']) && isset($_SESSION['Admin']['Last-Name']) && $_SESSION['Admin']['User-Type']) {
                            echo $_SESSION['Admin']['First-Name'] . " " . $_SESSION['Admin']['Last-Name'];
                            $viewType = new UserTypeView();
                        } 
                        else {
                            echo "User Name";
                        }
                    ?>   
                </div>
                <div class="account-settings-btn">
                    <button class="account-btn" onclick="accountDrop()"><img src="../imgs/chevron-down-black.svg" id="account-drop" alt=""></button>
                    <div class="account-settings-btn-content-wrapper">
                        <div class="user-info-wrapper border-100sb">
                            <img src="../imgs/check2-circle.svg" alt="">
                            <div class="user-name">
                                <p class="account-type">User</p>
                            </div>
                        </div>
                        <div class="account-edit-info-wrapper">
                            <a href="../adminPages/edit_information_links.php"><img src="../imgs/edit-information.svg" class="edit-info-icon" alt="" ></a>
                            <a href="../adminPages/edit_information_links.php" class="edit-info-text">Edit Profile</a>
                        </div>  

                        <div class="account-link-wrapper">
                            <!-- <a href=""><img src="" alt="">Edit Profile</a><br> -->
                            <a href="../../fcking-enrollment-system/client_side/Change_Password.php"><img src="../imgs/lock-solid.svg" class="change-pass-icon" alt=""></a>
                            <a href="../../fcking-enrollment-system/client_side/Change_Password.php" class="update-password">Update Password</a><br>
                        </div>
                        <div class="account-logout-wrapper">
                            <a href="../../fcking-enrollment-system/server_side/logout.php" id="logout"><img src="../imgs/logout.svg" class="logout-icon" alt=""></a>
                            <a href="../../fcking-enrollment-system/server_side/logout.php" class="logout-text">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END OF HEADER-->

</body>
</html>

