<?php
require_once 'change_password.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_SESSION['User']['User-Type'] == 4 )) {
    $User_Typed_Password = $_POST['old-password'];
    $User_New_Password = $_POST['new-password'];
    $User_New_Password_Confirm = $_POST['confirm-password'];

    $change_password = new ChangePassword();
    $change_password->change_passwordUsers($User_Typed_Password, $User_New_Password, $User_New_Password_Confirm);
} 

else if($_SERVER['REQUEST_METHOD'] === 'POST' && in_array($_SESSION['Admin']['User-Type'], [1, 2, 3])) {
    $User_Typed_Password = $_POST['old-password'];
    $User_New_Password = $_POST['new-password'];
    $User_New_Password_Confirm = $_POST['confirm-password'];

    $change_password = new ChangePassword();
    $change_password->change_passwordAdmins($User_Typed_Password, $User_New_Password, $User_New_Password_Confirm);
}

else {
    echo "Invalid request method or user type.";
}
?>