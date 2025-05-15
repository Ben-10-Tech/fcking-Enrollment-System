<?php
    require_once '../server_side/adminTeacherInfoModel.php';
    if ($_SESSION['Admin']['User-Type'] != 1) {
        die("Unauthorized");
    }

    class TeacherInformationView {
        protected $teacherInfoModel;
        protected $staff_id;
        protected $teacherInformation;

        const ACTIVE = 1;
        const TRANSFERRED_OUT = 2; 
        const INACTIVE = 3;

        public function __construct(){
            $this->teacherInfoModel = new TeacherInformationModel();

            if (isset($_GET['staff_id'])) {
                $this->staff_id = $_GET['staff_id'];
                $this->teacherInformation = $this->teacherInfoModel->getAllResults($this->staff_id);
            } else {
                echo "No teacher has been selected";
            }
        }

        public function displayFullName() {
            $First_Name = $this->teacherInformation['Staff_First_Name'];
            $Middle_Name = $this->teacherInformation['Staff_Middle_Name'];
            $Last_Name = $this->teacherInformation['Staff_Last_Name'];
            $Full_Name = $First_Name . " " . $Middle_Name . " " . $Last_Name;
            echo $Full_Name;
        }

        public function displayEmail() {
            $Email = $this->teacherInformation['Staff_Email'];
            echo $Email;
        }

        public function displayContact() {
            $Contact_Number = $this->teacherInformation['Staff_Contact_Number'];
            echo $Contact_Number;
        }

        public function displayAddress() {
            if (!isset($this->teacherInformation['staff_address_id'])) {
                echo "N/A";
            }
            else {

                $Region = $this->teacherInformation['Region'];
                $Province_Name = $this->teacherInformation['Province_Name'];
                $Municipality_Name = $this->teacherInformation['Municipality_Name'];
                $Barangay_Name = $this->teacherInformation['Brgy_Name'];
                $Subdivision = $this->teacherInformation['Subd_Name'];
                $House_Number = $this->teacherInformation['House_Number'];
                $Address = $Region . "" . ", " . $Province_Name . ", " . $Municipality_Name . ", " . $Barangay_Name . ", " . $Subdivision . ", " . $House_Number;
                echo $Address;
            }
        }

        public function displayStatus() {
            $status = $this->teacherInformation['Staff_Status'];
            switch ($status) {
                case self::ACTIVE:
                    echo "Active";
                    break;
                case self::TRANSFERRED_OUT:
                    echo "Transferred Out";
                    break;
                case self::INACTIVE:
                    echo "Inactive";
                    break;
                default:
                    echo "Unknown Status";
            }
        }

        
    }
?>