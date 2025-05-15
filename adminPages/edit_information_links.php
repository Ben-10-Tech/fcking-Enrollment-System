<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="../css/edit_information_links.css">
    <?php
        include '../adminPages/admin_base_designs.php'; 
    ?>
</head>
<body>
    <!--START OF THE MAIN CONTENT-->
    <div class="content">
        <div class="container">
            <p class="title">Edit Information</p>
            <div class="links">
                <div class="card">
                    <a href="../adminPages/edit_personal_information.php">Update Personal Information</a> <br> <br>
                    <p class="info">This is all about your personal information such as your full name, email, and contact number</p>
                </div>
                <div class="card">
                    <a href="../adminPages/edit_address_test.php">Update Address</a> <br> <br>  
                    <p class="info">This is all about your personal information such as your full address</p>
                </div>
                <div class="card">
                    <a href="../adminPages/edit_identifiers_test.php">Update Credentials</a> <br> <br>
                    <p class="info">This is all about your personal information such as your government IDs</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
