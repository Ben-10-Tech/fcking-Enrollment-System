<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/admin_login_form.css">
    <link rel="stylesheet" href="../css/fonts.css">
</head>
<body>
    <div class="bg-image">
    <div class="blurred-background"></div>
        <div class="form">
            <form class="overlay-form" method="POST" action="../server_side/post_admin_login.php">
                <div class="title-container">
                    <a href="login_form.php" class="login-back">Back to Login</a>
                    <h2 style="text-align: center;">Admin LogIn</h2>
                </div>
                <input type="text" name="phone_number" placeholder="Phone Number" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">LogIn</button>
            </form>
        </div>
    </div>
</body>

</html>
