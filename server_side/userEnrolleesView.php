<?php
    declare(strict_types =1);
    require_once __DIR__ . '/EnrolleesModel.php';
class displayEnrollmentForms {
    protected $conn;
    protected $enrollee;
    
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->enrollee = new getEnrollees();
    }

    public function displaySubmittedForms() {
        try {
            if(isset($_SESSION['User-Id'])) {
                $id = $_SESSION['User-Id'];
    
                $data = $this->enrollee->getUserEnrollees($id);
                foreach($data as $rows) {
                    $studentMiddleInitial = substr($rows['Student_Middle_Name'], 0, 1) . ".";
                    echo '<tr> 
                            <td>'   .htmlspecialchars($rows['Student_Last_Name']) . ', ' 
                                    .htmlspecialchars($rows['Student_First_Name']) . ' ' 
                                    .htmlspecialchars($studentMiddleInitial) 
                                    . '</td>
                            <td class = "button"> <a class= "Check-Status" href="../userPages/User_Enrollment_Status.php?id='.htmlspecialchars($rows['Enrollee_Id']).'"> Check Status </a></td>
                        </tr>';
                }       
            }
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

