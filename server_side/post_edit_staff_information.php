<?php
    require_once '../server_side/edit_staff_information.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $EditInformation = new EditInformation();
    if (!isset($_POST['form_type'])) {
        echo "Error: Missing form identifier.";
        exit;
    }

    switch ($_POST['form_type']) {
        case 'update_address':
            $House_Number = $_POST['House_Number'];
            $Subd_Name = $_POST['Subd_Name'];
            $Brgy_Name = $_POST['Brgy_Name'];
            $Municipality_Name = $_POST['Municipality_Name'];
            $Province_Name = $_POST['Province_Name'];
            $Region = $_POST['Region'];

            $EditInformation->Update_Address($House_Number, $Subd_Name, $Brgy_Name, $Municipality_Name, $Province_Name, $Region);
            break;

        case 'update_identifiers':
            $Employee_Number = $_POST['Employee_Number'];
            $Philhealth_Number = $_POST['Philhealth_Number'];
            $TIN = $_POST['TIN'];
            
            $EditInformation->Update_Identifiers($Employee_Number, $Philhealth_Number, $TIN);
            break;
        
        case 'update_information':
            $Staff_First_Name = $_POST['Staff_First_Name'];
            $Staff_Middle_Name = $_POST['Staff_Middle_Name'];
            $Staff_Last_Name = $_POST['Staff_Last_Name'];
            $Staff_Email = $_POST['Staff_Email'];
            $Staff_Contact_Number = $_POST['Staff_Contact_Number'];

            $EditInformation->Update_Information($Staff_First_Name, $Staff_Middle_Name, $Staff_Last_Name, $Staff_Email, $Staff_Contact_Number);
            break;
            
        default:
            echo "Error: Invalid form type.";
            break;
    }


}

?>