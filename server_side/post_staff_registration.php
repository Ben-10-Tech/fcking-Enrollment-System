<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");
include_once 'staff_registration.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $Staff_First_Name = $_POST['Staff_First_Name'];
        $Staff_Middle_Name = $_POST['Staff_Middle_Name'];
        $Staff_Last_Name = $_POST['Staff_Last_Name'];
        $Staff_Email = $_POST['Staff_Email'];
        $Staff_Contact_Number = $_POST['Staff_Contact_Number'];
        $Staff_Status = '1';
        $Staff_Type = '2';

        $register = new StaffRegistration();
        $result = $register->registerStaff($Staff_First_Name, $Staff_Middle_Name, $Staff_Last_Name, $Staff_Email, $Staff_Contact_Number, $Staff_Status, $Staff_Type);
        echo json_encode($result);
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Registration failed: ' . $e->getMessage()
        ]);
    }


}
?>