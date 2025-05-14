<?php
declare(strict_types=1);
require_once __DIR__ . '/dbconnection.php';
require_once __DIR__ . '/EnrolleesModel.php';

class adminEnrolledView {
    protected $conn;
    protected $getEnrolled;
    protected $getEnrolledCount;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $enrollee = new getEnrollees();
        $this->getEnrolled = $enrollee->getEnrolled();
        $this->getEnrolledCount = $enrollee->countEnrolled();
    }

    public function displayCount() {
        try {
            $count = $this->getEnrolledCount;
            echo "<h2>" . htmlspecialchars($count) . "</h2>";
        }
        catch(PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }

    public function displayEnrolled() {
        try {
    
            $data = $this->getEnrolled;
            foreach($data as $rows) {   
                $dbEnrollmentStatus = htmlspecialchars($rows['Enrollment_Status']);
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
                        <td> <button class="view-button" data-id="' . $rows['Enrollee_Id'] . '"> View info</button><td>
                        </tr>';
            }
        }
        catch(PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }

}