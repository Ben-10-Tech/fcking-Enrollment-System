<?php
declare(strict_types=1);
require_once __DIR__ . '/dbconnection.php';

class getEnrollees {
    protected $conn;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    public function getEnrollees(){
        $sql = "SELECT * FROM enrollee_parents
                INNER JOIN enrollee ON enrollee_parents.Enrollee_Id = enrollee.Enrollee_Id
                INNER JOIN educational_information ON  enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                INNER JOIN parent_information ON enrollee_parents.Parent_Id = parent_information.Parent_Id 
                WHERE parent_information.Parent_Type = 'Guardian' AND Enrollment_Status = 3;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getEnrollmentInformation($id) {
        $sql = "SELECT * FROM enrollee_parents
                INNER JOIN enrollee ON enrollee_parents.Enrollee_Id = enrollee.Enrollee_Id
                INNER JOIN educational_information ON  enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                INNER JOIN educational_background ON enrollee.Educational_Background_Id = educational_background.Educational_Background_Id
                INNER JOIN enrollee_address ON enrollee.Enrollee_Address_Id = enrollee_address.Enrollee_Address_Id
                INNER JOIN disabled_student ON enrollee.Disabled_Student_Id = disabled_student.Disabled_Student_Id
                INNER JOIN parent_information ON enrollee_parents.Parent_Id = parent_information.Parent_Id 
                WHERE enrollee_parents.Enrollee_Id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function countEnrollees():string {
        $sql = "SELECT COUNT(*) AS total FROM enrollee WHERE Enrollment_Status = 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return (string)$result['total'];
    }

    public function getPsaImg($id) {
        $sql = " SELECT Psa_directory.directory FROM enrollee 
                INNER JOIN Psa_directory ON enrollee.Psa_Image_Id = Psa_directory.Psa_Image_Id
                WHERE Enrollee_Id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($result) {
            return (string)$result['directory'];
        }
        else {
            return "";
        }
    }

    public function updateEnrollee($id, $status) {
        $sql = "UPDATE enrollee SET Enrollment_Status = :status WHERE Enrollee_Id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getUserEnrollees($id) {
        $sql = "SELECT * FROM enrollee WHERE User_Id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT );
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUserStatus($userId, $enrolleeId) {
        $sql = "SELECT Enrollment_Status FROM enrollee WHERE User_Id = :userId AND Enrollee_Id = :enrolleeId";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':enrolleeId', $enrolleeId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$result['Enrollment_Status'];
    }
}