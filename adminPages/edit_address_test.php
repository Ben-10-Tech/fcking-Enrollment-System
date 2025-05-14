<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <?php
        include '../adminPages/admin_base_designs.php'; 
    ?>

      <!--START OF THE MAIN CONTENT-->
        <div class="content">
            <form action="../server_side/post_edit_staff_information.php" method="POST">
                <!--DO NOT REMOVE!! For Switch case statement-->
                <input type="hidden" name="form_type" value="update_address">

                <label for="House_Number">House Number:</label><br>
                <input type="text" id="House_Number" name="House_Number" required><br><br>

                <label for="Subd_Name">Subdivision Name:</label><br>
                <input type="text" id="Subd_Name" name="Subd_Name" required><br><br>

                <label for="Brgy_Name">Barangay Name:</label><br>
                <input type="text" id="Brgy_Name" name="Brgy_Name" required><br><br>

                <label for="Municipality_Name">Municipality:</label><br>
                <input type="text" id="Municipality_Name" name="Municipality_Name" required><br><br>

                <label for="Province_Name">Province:</label><br>
                <input type="text" id="Province_Name" name="Province_Name" required><br><br>

                <label for="Region">Region:</label><br>
                <input type="text" id="Region" name="Region" required><br><br>

                <button type="submit">Update Address</button>
            </form>
        </div>
    </div>
</body>
</html>

