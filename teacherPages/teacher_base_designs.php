<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/teacher-base-designs.css">
<link rel="stylesheet" href="../css/reset.css">
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

            </div>
        </div>
    </div>
    <div class="main-content">

    </div>
    <script src="../js/teacher-base-designs.js" defer></script>
</body>
</html>
