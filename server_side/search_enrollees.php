<?php 

declare(strict_types=1);
require_once __DIR__ . '/EnrolleesModel.php';

class searchEnrollee {
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
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->getEnrollees = new getEnrollees();
    }

    public function displaySearchResults() {

        if (isset($_POST['query'])) {
            $query = $_POST['query'];

            $data = $this->getEnrollees->searchEnrollees($query);

            if ($data) {
                foreach ($data as $rows) {
                    $dbEnrollmentStatus = htmlspecialchars($rows['Enrollment_Status']);
                    $enrollmentStatus = $this->stringEquivalent((int) $dbEnrollmentStatus);
                    $studentMiddleInitial = !empty($rows['Student_Middle_Name']) ? substr($rows['Student_Middle_Name'], 0, 1) . "." : "";
                    echo '<tr class="enrollee-row"> 
                            <td>' . htmlspecialchars($rows['Learner_Reference_Number']) . '</td>
                            <td>' . htmlspecialchars($rows['Student_Last_Name']) . ', ' 
                            . htmlspecialchars($rows['Student_First_Name']) . ' ' 
                            . htmlspecialchars($studentMiddleInitial) . '</td>
                            <td>' . htmlspecialchars($rows['Age']) . '</td>
                            <td>' . htmlspecialchars($rows['Birth_Date']) . '</td>
                            <td>' .htmlspecialchars($rows['Sex']) . '</td> 
                            <td>' . $enrollmentStatus .'</td>
                            <td> <button class="view-button" data-id="' . $rows['Enrollee_Id'] .'"> View Info </button> </td>
                        </tr>';
                }
            } else {
                echo '<tr><td colspan="5">No results found</td></tr>';
            }
        }
    }
}
