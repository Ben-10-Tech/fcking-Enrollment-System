<?php
    declare(strict_types=1);

require_once __DIR__ . '/dbconnection.php';
require_once __DIR__ . '/EnrolleesModel.php';

class AdminEnrollmentStatusView {
    protected $conn;
    protected $getEnrollees;
    public const ENROLLED = 1;
    public const DENIED = 2;
    public const PENDING = 3;

    public function stringEquivalent(int $value): string {
       switch($value) {
            case self::ENROLLED:
                return "ENROLLED";
            case self::DENIED:
                return "DENIED";
            case self::PENDING:
                return "PENDING";
        }
    }
    public function __construct(){
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->getEnrollees = new getEnrollees();
    }

    public function displayCount() {
        try {
            $count = $this->getEnrollees->countEnrollees();
            echo "<h2>" . htmlspecialchars($count) . "</h2>";
        }
        catch(PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }
    public function displayEnrollees() {
    
        try {
    
            $data = $this->getEnrollees->getEnrollees();
            foreach($data as $rows) {   
                $dbEnrollmentStatus = htmlspecialchars($rows['Enrollment_Status']);
                $enrollmentStatus = $this->stringEquivalent((int) $dbEnrollmentStatus);
                $parentMiddleInitial = substr($rows['Middle_Name'], 0, 1) . ".";
                $studentMiddleInitial = substr($rows['Student_Middle_Name'], 0, 1) . ".";
                echo '<tr class="enrollee-row"> 
                        <td>' . htmlspecialchars($rows['Learner_Reference_Number']) . '</td>
    
                        <td>' .htmlspecialchars($rows['Student_Last_Name']) . ', ' 
                        .htmlspecialchars($rows['Student_First_Name']) . ' ' 
                        .htmlspecialchars($studentMiddleInitial) . '</td>
                        <td>' . htmlspecialchars($rows['Last_Grade_Level']) . '</td>
                        <td>' . htmlspecialchars($rows['Last_Name']) . ', ' . htmlspecialchars($rows['First_Name']) . ' ' 
                               .htmlspecialchars($parentMiddleInitial) . '</td> 
                        <td>' 
                        . htmlspecialchars($rows['Contact_Number']) . 
                        '</td>
                        <td>'
                            . $enrollmentStatus.'
                        </td>
                        <td> <button class="view-button" data-id="' . $rows['Enrollee_Id'] . '"> View info</button><td>
                        </tr>';
            }
        }
        catch(PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }
    
}
