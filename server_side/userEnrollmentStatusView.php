<?php
declare(strict_types =1);

require_once __DIR__ . '/dbconnection.php';
require_once __DIR__ . '/EnrolleesModel.php';

class displayEnrollmentStatus {
    protected $conn;
    protected $enrollee;
    public const ENROLLED = 1;
    public const DENIED = 2;
    public const PENDING = 3;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->enrollee = new getEnrollees();
    }

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
    
    public function displayStatus() {

        if(isset($_SESSION['User-Id']) && isset($_GET['id'])) {
            $userId = $_SESSION['User-Id'];
            $enrolleeId = $_GET['id'];

            $data = $this->enrollee->getUserStatus($userId, $enrolleeId);
            $status = $this->stringEquivalent((int) $data);
            echo "<script> console.log('" . $status . "') </script>";

            echo '<h6 class="status-text" id="status-text">' . $status .'</h6>';
        }
    }
}