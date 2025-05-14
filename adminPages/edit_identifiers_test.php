<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Identifiers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: auto;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
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
