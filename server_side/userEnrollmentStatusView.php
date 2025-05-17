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

    public function stringEquivalent(int $status): string {
        return match ($status) {
        3 => 'PENDING',
        4 => 'ENROLLED',
        1 => 'DENIED',
        2 => 'FOR FOLLOW-UP',
        default => 'UNKNOWN',
    };
    }
public function displayStatus() {
    if (isset($_SESSION['User']['User-Id']) && isset($_GET['id'])) {
        $userId = $_SESSION['User']['User-Id'];
        $enrolleeId = $_GET['id'];

        $statusCode = $this->enrollee->getUserStatus($userId, $enrolleeId);

        if ($statusCode === null) {
            echo "<p>Status not found.</p>";
            return;
        }

        $status = $this->stringEquivalent($statusCode);

        if ($status === "ENROLLED") {
            echo "<p> SUCCESSFULLY ENROLLED</p>";
        } else {
            echo "<p>STATUS: {$status}</p>";

            $transactions = $this->enrollee->sendTransactionStatus($enrolleeId);

            if (empty($transactions)) {
                echo "<p>No follow-up or denial remarks recorded.</p>";
            } else {
                // Group reasons by transaction code
                $grouped = [];

                foreach ($transactions as $row) {
                    $code = $row['Transaction_Code'];
                    if (!isset($grouped[$code])) {
                        $grouped[$code] = [
                            'Description' => $row['Description'],
                            'Reasons' => [],
                        ];
                    }
                    $grouped[$code]['Reasons'][] = $row['Reason'];
                }

                // Now output once grouping is complete
                foreach ($grouped as $code => $data) {
                    echo '<div style="margin-bottom:15px;">';
                    echo '<p><strong>Transaction Code:</strong> ' . htmlspecialchars($code) . '</p>';
                    echo '<p><strong>Description:</strong> ' . htmlspecialchars($data['Description']) . '</p>';
                    echo '<ul><strong>Reasons:</strong>';
                    foreach ($data['Reasons'] as $reason) {
                        echo '<li>' . htmlspecialchars($reason) . '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
            }
        }
    } else {
        echo "<p>Invalid access. User or enrollee ID is missing.</p>";
    }
}    
}
