<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Registration</title>
</head>
<body>
    <h2>Register New Staff</h2>
    <form action="../server_side/post_staff_registration.php" method="POST">
        <label for="Staff_First_Name">First Name:</label><br>
        <input type="text" name="Staff_First_Name" id="Staff_First_Name" required><br><br>

        <label for="Staff_Middle_Name">Middle Name:</label><br>
        <input type="text" name="Staff_Middle_Name" id="Staff_Middle_Name"><br><br>

        <label for="Staff_Last_Name">Last Name:</label><br>
        <input type="text" name="Staff_Last_Name" id="Staff_Last_Name" required><br><br>

        <label for="Staff_Email">Email:</label><br>
        <input type="email" name="Staff_Email" id="Staff_Email" required><br><br>

        <label for="Staff_Contact_Number">Contact Number:</label><br>
        <input type="text" name="Staff_Contact_Number" id="Staff_Contact_Number" required><br><br>

        <input type="submit" value="Register Staff">
    </form>
</body>
</html>
