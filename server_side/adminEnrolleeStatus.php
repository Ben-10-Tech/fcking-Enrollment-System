<?php
    declare(strict_types=1);
    require_once __DIR__ . './dbconnection.php';
    require_once __DIR__ . './EnrolleesModel.php';

class AdminEnrollmentAccessStatus {
    protected $conn;
    protected $getEnrollees;
    
    public function __construct() {
       $db = new Connect();
       $this->conn = $db->getConnection();
       $this->getEnrollees = new getEnrollees();
    }

    public function schoolLevelInfo() {
       if(isset($_GET['id'])) {
         $student = $_GET['id'];
         $allInfo = [];
         $data = $this->getEnrollees->getEnrollmentInformation($student);
         foreach($data as $rows) {
             $allInfo = [
                 'taong panuruan' => htmlspecialchars($rows['School_Year_Start']) . '-' . htmlspecialchars($rows['School_Year_End']),
                 'Baitang na nais ipatala' => htmlspecialchars($rows['Enrolling_Grade_Level']),
                 'Huling baitang na natapos' => htmlspecialchars($rows['Last_Grade_Level']),
                 'Huling natapos na taon' => htmlspecialchars($rows['Last_Year_Attended']),
                 'Huling paaralan' => htmlspecialchars($rows['Last_School_Attended']),
                 'ID ng paaralan' => htmlspecialchars($rows['School_Id']),
                 'Address ng paaralan' => htmlspecialchars($rows['School_Address']),
                 'Nais na paaralan' => htmlspecialchars($rows['Initial_School_Choice']),
                 'Address ng nais na paaralan' => htmlspecialchars($rows['Initial_School_Address']),
                 'ID ng nais na paaralan' => htmlspecialchars($rows['Initial_School_Id']),
             ];
     }
     foreach($allInfo as $field=> $value) {
         echo '<tr> 
                 <td>' . $field . '</td>
                 <td>' . $value . '</td>
             </tr>';
     }            
       }
} 
    
    public function enrolleeInfo() {
        if(isset($_GET['id'])) {
        $student = $_GET['id'];
        $allInfo = [];
        $data = $this->getEnrollees->getEnrollmentInformation($student);
        foreach($data as $rows) {
            $culutralGroup = ($rows['If_Cultural'] == 1) ? htmlspecialchars($rows['Cultural_Group']) : 'Walang katutubong grupo';
            $allInfo = [
                'Numero ng Sertipiko ng Kapanganakan' => htmlspecialchars($rows['Psa_Number']),
                'Learner Reference Number' => htmlspecialchars($rows['Learner_Reference_Number']),
                'Buong Pangalan' => htmlspecialchars($rows['Student_Last_Name']) . ', '. htmlspecialchars($rows['Student_First_Name']) . ' ' . htmlspecialchars($rows['Student_Middle_Name']),
                'Petsa ng Kapanganakan' => htmlspecialchars($rows['Birth_Date']),
                'Edad' => htmlspecialchars($rows['Age']),
                'Kabilang sa katutubong grupo ' => $culutralGroup,
                'Kinagisnang wika' => htmlspecialchars($rows['Native_Language']),
                'Relihiyon' => htmlspecialchars($rows['Religion']),
                'Email Address' => htmlspecialchars($rows['Student_Email']),
                'Buong Address' => htmlspecialchars($rows['House_Number']) .' ' .htmlspecialchars($rows['Subd_Name'])
                 . '. ' .htmlspecialchars($rows['Brgy_Name']). ', ' .htmlspecialchars($rows['Municipality_Name']) . ', '
                 . htmlspecialchars($rows['Province_Name']) . ' ' . htmlspecialchars($rows['Region']),
            ];
    }
    foreach($allInfo as $field=> $value) {
        
        echo '<tr> 
                <td>' . $field . '</td>
                <td>' . $value . '</td>
            </tr>';
    }            
        }
    }   
    public function ifDisabled() {
        if(isset($_GET['id'])) {
            $student = $_GET['id'];
            $allInfo = [];
            $data = $this->getEnrollees->getEnrollmentInformation($student);
            foreach($data as $rows) {
                $specialCondition = ($rows['Have_Special_Condition'] == 1) ? htmlspecialchars($rows['Special_Condition']) : 'None';
                $assistiveTech = ($rows['Have_Assistive_Tech'] == 1) ? htmlspecialchars($rows['Assistive_Tech']) : 'None';
                
                $allInfo = [
                    'May espesyal na kondisyon' => $specialCondition,
                    'Assistive technology' => $assistiveTech
                ];  
            }
            foreach($allInfo as $field=> $value) {
                echo '<tr> 
                        <td>' . $field . '</td>
                        <td>' . $value . '</td>
                    </tr>';
            }
        }
    }

    public function parentInfo() {
        if(isset($_GET['id'])) {
            $student = $_GET['id'];
            $allInfo = [];
            $data = $this->getEnrollees->getEnrollmentInformation($student);
            foreach($data as $rows) {
                $if4ps = ($rows['If_4Ps'] == 1) ? 'Oo' : 'Hindi';
                $allInfo[] = [
                    'Relasyon' => htmlspecialchars($rows['Parent_Type']),
                    'Pangalan' => htmlspecialchars($rows['Last_Name']) . ', '. htmlspecialchars($rows['First_Name']) . ' ' . htmlspecialchars($rows['Middle_Name']),
                    'Educational attainment' => htmlspecialchars($rows['Educational_Attainment']),
                    'Numero ng telepono' => htmlspecialchars($rows['Contact_Number']),
                    'Kabilang sa 4ps' => $if4ps
                ];
            }
            foreach($allInfo as $info) {
                foreach($info as $field=> $value) {
                    echo '<tr> 
                            <td>' . $field . '</td>
                            <td>' . $value . '</td>
                        </tr>';
                }
                echo '<tr>
                        <td colspan="2" class="divider"></td>
                    </tr>';
            }
        }
    }

    public function displayPsaImg() {

       try{
            if(isset($_GET['id'])) {
                $student = $_GET['id'];
                $data = $this->getEnrollees->getPsaImg($student);
                $img = htmlspecialchars($data);
                $noImg = "Walang pinasang PSA image";
                if ($img == "") {
                    echo "<p> $noImg </p>";
                }
                else {
                    echo "<img src='$img' alt='PSA image' class='psa-img'>";
                }
            }
       }
       catch(PDOException $e) {
        die("Query Failed: " . $e->getMessage());
       }
    }
}