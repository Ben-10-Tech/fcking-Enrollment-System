<?php

declare(strict_type =1);

require_once __DIR__ .'/dbconnection.php';

class getGradeLevels {
    protected $conn;
    
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->createSelectValues();
    }

    private function gradeLevelquery() {
        $sql = "SELECT * FROM grade_level";
        $stmt = $this->conn->prepare($sql);
        $stmt-> execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    private function createSelectValues() {

        try {
            $data = $this->gradeLevelQuery();
            if ($data) {
                foreach($data as $rows) {
                echo '<option value=' . htmlspecialchars($rows['Grade_Level']) .'>' . 
                htmlspecialchars($rows['Grade_Level'])  . '</option>';
                }
            }
            else {
                echo "<option> No values found </option>";
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}