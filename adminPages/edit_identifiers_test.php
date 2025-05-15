<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Identifiers</title>
    <link rel="stylesheet" href="../css/edit_identifiers_test.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <?php
        include '../adminPages/admin_base_designs.php'; 
    ?>

      <!--START OF THE MAIN CONTENT-->
      <div class="content">
        <form action="../server_side/post_edit_staff_information.php" method="POST">
            <p class="title">Edit Government IDs</p>
            <!--DO NOT REMOVE!! For Switch case statement-->
            <input type="hidden" name="form_type" value="update_identifiers">

            <label for="Employee_Number">Employee Number:</label>
            <input type="text" id="Employee_Number" name="Employee_Number" required>

            <label for="Philhealth_Number">Philhealth Number:</label>
            <input type="text" id="Philhealth_Number" name="Philhealth_Number" required>

            <label for="TIN">TIN:</label>
            <input type="text" id="TIN" name="TIN" required>

            <input type="submit" value="Update">
        </form>

      </div>
  </div>
</body>
</html>
