<?php
declare(strict_types=1);

require_once __DIR__ .'/../server_side/dbconnection.php';

class studentsModel {
    protected $conn;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }
    public function getEnrollingGradeLevel($id) {
        $sql = "SELECT Enrolling_Grade_Level FROM enrollee 
        INNER JOIN educational_information AS ei ON enrollee.Educational_Information_Id = ei.Educational_Information_Id
        WHERE Enrollee_Id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['Enrolling_Grade_Level'];
    }
    public function insertEnrolleeToStudent($enrolleeId) {
        try {
            $this->conn->beginTransaction();
            $gradeLevel = $this->getEnrollingGradeLevel($enrolleeId);
            $sql = "INSERT INTO students(Enrollee_Id, Grade_Level_Id) VALUES(:enrollee_id, :grade_level)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':enrollee_id', $enrolleeId);
            $stmt->bindParam(':grade_level', $gradeLevel);

            if($stmt->execute()) {
                $this->conn->commit();
                return ['success'=> true, 'message'=> 'query executed'];
            }
            else {
                $this->conn->rollBack();
                return ['success'=> false, 'message'=> 'query failed'];
            }
            
        }
        catch(PDOException $e) {
            $this->conn->rollBack();
            return ['query'=> false, 'message'=> $e->getMessage()];
        }
    }
    public function getAllStudents() {
        try {
            $sql = "SELECT  e.Enrollee_Id,
                            e.Student_First_Name,
                            e.Student_Last_Name,
                            e.Student_Middle_Name,
                            e.Learner_Reference_Number,
                            g.Grade_Level,
                            se.Section_Name
                    FROM students AS s
                    LEFT JOIN enrollee AS e ON s.Enrollee_Id = e.Enrollee_Id
                    LEFT JOIN grade_level AS g ON s.Grade_Level_Id = g.Grade_Level_Id
                    LEFT JOIN sections AS se ON s.Section_Id = se.Section_Id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}