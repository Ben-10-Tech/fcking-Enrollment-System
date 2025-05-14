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
        <!-- Hidden input to identify the form type -->
        <input type="hidden" name="form_type" value="update_information">

        <label for="Staff_First_Name">First Name:</label><br>
        <input type="text" id="Staff_First_Name" name="Staff_First_Name" required><br><br>

        <label for="Staff_Middle_Name">Middle Name:</label><br>
        <input type="text" id="Staff_Middle_Name" name="Staff_Middle_Name"><br><br>

        <label for="Staff_Last_Name">Last Name:</label><br>
        <input type="text" id="Staff_Last_Name" name="Staff_Last_Name" required><br><br>

        <label for="Staff_Email">Email:</label><br>
        <input type="email" id="Staff_Email" name="Staff_Email" required><br><br>

        <label for="Staff_Contact_Number">Contact Number:</label><br>
        <input type="text" id="Staff_Contact_Number" name="Staff_Contact_Number" required><br><br>

        <button type="submit">Update Information</button>
        </form>
      </div>
  </div>
</body>
</html>
