<?php
include_once 'dbconnection.php';

class DashboardModel {
    protected $conn;

    function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    public function EnrolledStudents(){
        $sql_get_enrolled = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee WHERE Enrollment_Status = 1;";
        $get_enrolled = $this->conn->prepare($sql_get_enrolled);
        $get_enrolled->execute();
        $enrollee_count = $get_enrolled->fetch(PDO::FETCH_ASSOC);
        return $enrollee_count['enrollee_count'];
    }

    public function TemporarilyEnrolledStudents() {
        $sql_get_temporary = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee WHERE Enrollment_Status = 2;";
        $get_temporary = $this->conn->prepare($sql_get_temporary);
        $get_temporary->execute();
        $temporary_count = $get_temporary->fetch(PDO::FETCH_ASSOC);
        return $temporary_count['enrollee_count'];
    }

    public function PendingStudents(){
        $sql_get_pending = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee WHERE Enrollment_Status = 3;";
        $get_pending = $this->conn->prepare($sql_get_pending);
        $get_pending->execute();
        $pending_count = $get_pending->fetch(PDO::FETCH_ASSOC);
        return $pending_count['enrollee_count'];
    }

    public function FollowUpStudents() {
        $sql_get_to_follow = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee WHERE Enrollment_Status = 4;";
        $get_to_follow = $this->conn->prepare($sql_get_to_follow);
        $get_to_follow->execute();
        $to_follow_count = $get_to_follow->fetch(PDO::FETCH_ASSOC);
        return $to_follow_count['enrollee_count'];
    }

    public function PendingEnrolleesInformation() {
        $sql_get_pending_enrollees = "SELECT enrollee.Enrollee_Id,
                                        enrollee.Learner_Reference_Number,
                                        enrollee.Student_First_Name,
                                        enrollee.Student_Middle_Name,
                                        enrollee.Student_Last_Name,
                                        enrollee.Student_Extension,

                                        enrolling_level.Grade_Level AS E_Grade_Level
                                        FROM enrollee
                                        JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id
                                        INNER JOIN grade_level as enrolling_level ON enrolling_level.Grade_Level_Id = educational_information.Enrolling_Grade_Level
                                        WHERE Enrollment_Status = 3
                                        ORDER BY Enrollee_Id DESC
                                        LIMIT 5";
        $get_pending_enrollees = $this->conn->prepare($sql_get_pending_enrollees);
        $get_pending_enrollees->execute();
        $pending_enrollees = $get_pending_enrollees->fetchAll(PDO::FETCH_ASSOC);
        return $pending_enrollees;
    }
}

?>