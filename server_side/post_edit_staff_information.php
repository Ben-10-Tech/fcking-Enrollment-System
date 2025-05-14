<?php
    require_once '../server_side/edit_staff_information.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $House_Number = $_POST['House_Number'];
    $Subd_Name = $_POST['Subd_Name'];
    $Brgy_Name = $_POST['Brgy_Name'];
    $Municipality_Name = $_POST['Municipality_Name'];
    $Province_Name = $_POST['Province_Name'];
    $Region = $_POST['Region'];

    $EditInformation = new EditInformation();
    $EditInformation->Update_Address($House_Number, $Subd_Name, $Brgy_Name, $Municipality_Name, $Province_Name, $Region);
}

?>