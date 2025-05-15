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
                <table class="table-teachers">
                    <?php
                        require_once '../server_side/adminTeacherView.php';
                        $table = new DisplayTeachersView();
                        $table->displayAllTeachers();
                    ?>
                </table>
            </div>
        </div>
  </div>
</body>
</html>
