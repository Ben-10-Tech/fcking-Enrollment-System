<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/Change_Password.css">
    <script src="../js/change-password.js"></script>
</head>
<body>
    <div class="main-container">
        <div class="header">
            <h2>CHANGE PASSWORD</h2>
        </div>
        <div class="input-boxes">
            <form id="change-password-form" action="../server_side/post_change_password.php" method="post"><br>
                <input type="password" id="old-password" name="old-password" placeholder="Old Password" required><br>
                <input type="password" id="new-password" name="new-password" placeholder="New Password" required><br>   
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm New Password" required><br>
                <button type="submit" class="submit">Change Password</button>
            </form>
        </div>
    </div>
</body>
</html>