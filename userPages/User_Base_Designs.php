<?php
session_start();
if (!isset($_SESSION['User-Id']) || !isset($_SESSION['Registration-Id'])) {
    header("Location: ../client_side/login_form.php");
    exit();
}
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/user_base_design.css">
    <link rel="stylesheet" href="../css/reset.css">
    <script src="../js/user-base-designs.js"></script>
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
                    <span id="dashboard-spn" class="menu-title">Dashboard</span>
                    <button class="dashboard-btn" onclick="dashboarddrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="dashboard-ul">
                        <li>
                            <a href="../userPages/User_Enrollees.php">Home</a>
                        </li>
                        <li>
                            <a href="../userPages/Enrollment_Form.php" class="eForm">Enrollment Form</a>
                        </li>
                        <!-- <li>
                            <a href="../userPages/User_Enrollment_Status.php" class="eStat">Enrollment Status</a>
                        </li> -->
                    </ul>
                </div>

                <!--SUBJECTS-->
                <!-- <div class="menu border-100sb" id="subjects">
                    <img src="../imgs/book.svg" class="bi">
                    <span class="menu-title">Subjects</span>
                    <button class="subjects-btn" onclick="subjectsdrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="subjects-ul">
                            <li>
                            <a href="" class="classSched">Class Schedule</a>
                            </li>
                            <li>
                                <a href="view-Grades.php" class="viewGrades">View Grades</a>
                            </li>
                    </ul>
                </div> -->
                
                <!--TEACHERS-->
                <!-- <div class="menu border-100sb" id="teachers">
                    <img src="../imgs/people-fill.svg" class="bi bi-person">
                    <span class="menu-title">Teachers</span>
                    <button class="teachers-btn" onclick="teachersdrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="teachers-ul">
                        <li>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                        </li>
                </div> -->
                <!--MISSION AND VISION-->
                <div class="menu border-100sb" id="mv">
                    <img src="../imgs/check2-circle.svg" class="bi">
                    <a href=""><span class="menu-title">Mission & Vision</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">

        <!--MOBILE VERSION HEADER KUPAL KA KASI EH-->
       
        <div class="mobile-header-wrapper">
            <button class="bar-btn-mob" onclick="sideBarMobileOpen()"></button>
            <div class="title-search-mob">
                <h6 class="title-mob"> Welcome to South II Student Information System </h6>
                <input type="text" name="search" placeholder="Search here...">
            </div>
            <div class="user-btn-mob"></div>
        </div>
        <!--HEADER-->
        <div class="header-wrapper">
            <div class="header-title">
                <p class="header-title">
                    Welcome to South II Student Information System
                </p>
            </div>

            <div class="account">
                <button id="user-profile"><img src="../imgs/check2-circle.svg" alt=""></button>
                <div class="account-settings-wrapper">
                    <?php if(isset($_SESSION['First-Name']) && isset($_SESSION['Last-Name'])) {
                        $name = $_SESSION['First-Name'] . ", " . $_SESSION['Last-Name'];
                        echo "<p class='username'> $name </p>";
                        }
                    ?>
                    <p class="account-type">user</p>
                </div>
                <div class="account-settings-btn">
                    <button class="account-btn" onclick="accountDrop()"><img src="../imgs/chevron-down-black.svg" id="account-drop" alt=""></button>
                    <div class="account-settings-btn-content-wrapper">
                        <div class="user-info-wrapper border-100sb">
                            <img src="../imgs/check2-circle.svg" alt="">
                            <div class="user-name">
                                <p class="account-type">user</p>
                            </div>
                        </div>
                        <div class="account-link-wrapper">
                            <!-- <a href=""><img src="" alt="">Edit Profile</a><br> -->
                            <a href="../../fcking-enrollment-system/client_side/Change_Password.php"><img src="" alt="">Update Password</a><br>
                            <a href="../../fcking-enrollment-system/server_side/logout.php" id="logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END OF HEADER-->
        <!-- MOBILE VERISON SIDEBAR-->
        <div class="mobile-sidebar-wrapper">
            <div class="sidebar-show-mob">
                    <p class="ssis-title">SSIS</p>
                    <button class="bar-btn-show-mob" onclick="sideBarMobileClose()"></button>
                </div>
            <!-- DASHBOARD MOBILE -->
            <div class="menu-mob-wrapper">
                <div class="menu-mob border-100sb">
                    <div class="menu-button-wrapper">
                        <div class="dashboard-icon-mob icon-title-mob"></div>
                        <p class="dashboard-title menu-title-mob"> Dashboard </p>
                        <button class="dashboard-arrow-mob arrow-mob" onclick="dashboardDropMobile()"></button>
                    </div>
                    <ul class="dashboard-mob-ul"> 
                        <li> <a href="#"> Enrollment Form </a> </li>
                        <li> <a href="#"> Enrollment Status </a> </li>
                    </ul>
                </div>
            </div>
            <!-- SUBJECTS MOBILE -->
            <div class="menu-mob-wrapper">
                <div class="menu-mob border-100sb">
                    <div class="menu-button-wrapper">
                        <div class="subjects-icon-mob icon-title-mob"></div>
                        <p class="subjects-title menu-title-mob"> Subjects </p>
                        <button class="subjects-arrow-mob arrow-mob" onclick="subjectsDropMobile()"></button>
                    </div>
                    <ul class="subjects-mob-ul">
                        <li>
                            <a href="All_Subjects.php" class="">All subjects</a>
                        </li>
                        <li>
                            <a href="#" class="">View Grades</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- TEACHERS MOBILE -->
            <div class="menu-mob-wrapper">
                <div class="menu-mob border-100sb">
                    <div class="menu-button-wrapper">
                        <div class="teachers-icon-mob icon-title-mob"></div>
                        <p class="teachers-title menu-title-mob"> Teachers </p>
                        <button class="teachers-arrow-mob arrow-mob" onclick="teachersDropMobile()"></button>
                    </div>
                    <ul class="teachers-mob-ul">
                        <li>
                            <a href="#" class="">Prof Hi</a>
                        </li>
                        <li>
                            <a href="#" class="">Prof Hi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--MISSION AND VISION-->
            <div class="menu-mob-wrapper">
                <div class="menu-mob border-100sb">
                    <div class="menu-button-wrapper">
                        <div class="mv-icon-mob icon-title-mob"></div>
                        <p class="mv-title menu-title-mob">Mission and Vision</p>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
