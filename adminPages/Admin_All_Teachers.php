<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 

    <link rel="stylesheet" href="../css/Admin_All_Teachers.css">
    <?php
        include '../adminPages/admin_base_designs.php'; 
    ?>
        <!--START OF THE MAIN CONTENT-->
        <div class="content">
            <div class="table-wrapper">
                <p class="all-teachers-title">All Teachers</p>
                <table class="table-teachers">
                    <?php
                        require_once '../server_side/adminTeacherView.php';
                        $table = new DisplayTeachersView();
                        $table->displayAllTeachers();
                    ?>
                </table>
                <?php
                    if ($_SESSION['Admin']['User-Type'] == 1){
                        echo '<a href="../adminPages/Staff_Registration.php" class="btn btn-primary register">Register a New Teacher</a>';
                    }
                ?>
            </div>
        </div>
  </div>
</body>
</html>
