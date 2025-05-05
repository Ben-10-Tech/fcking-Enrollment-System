<?php
require_once 'dbconnection.php';
require_once 'send_password.php';

class StaffRegistration {
    protected $conn;
    
    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }
    
    public function staffInformation($Staff_First_Name, $Staff_Middle_Name, $Staff_Last_Name, $Staff_Email, $Staff_Contact_Number, $Staff_Status, $Staff_Type) {
        try {
            $sql_insert_staff_info = "INSERT INTO staffs(Staff_First_Name, Staff_Middle_Name, Staff_Last_Name, Staff_Email, Staff_Contact_Number, Staff_Status, Staff_Type) 
                                    VALUES (:Staff_First_Name, :Staff_Middle_Name, :Staff_Last_Name, :Staff_Email, :Staff_Contact_Number, :Staff_Status, :Staff_Type)";
            $insert_staff_info = $this->conn->prepare($sql_insert_staff_info);
            $insert_staff_info->bindParam(':Staff_First_Name', $Staff_First_Name);
            $insert_staff_info->bindParam(':Staff_Middle_Name', $Staff_Middle_Name);
            $insert_staff_info->bindParam(':Staff_Last_Name', $Staff_Last_Name);
            $insert_staff_info->bindParam(':Staff_Email', $Staff_Email);
            $insert_staff_info->bindParam(':Staff_Contact_Number', $Staff_Contact_Number);
            $insert_staff_info->bindParam(':Staff_Status', $Staff_Status);
            $insert_staff_info->bindParam(':Staff_Type', $Staff_Type);
            if ($insert_staff_info->execute()) {
                echo 'Registration Successful';
                return $this->conn->lastInsertId();
            }
            else {
                echo 'Registration Failed';
            }
        }
        catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function registerStaff($Staff_First_Name, $Staff_Middle_Name, $Staff_Last_Name, $Staff_Email, $Staff_Contact_Number, $Staff_Status, $Staff_Type) {
        try {
            $this->conn->beginTransaction();

            $Staff_Id = $this->staffInformation($Staff_First_Name, $Staff_Middle_Name, $Staff_Last_Name, $Staff_Email, $Staff_Contact_Number, $Staff_Status, $Staff_Type);
            $password = $this->generatePassword();
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);


            $sql_insert_staff_users = "INSERT INTO users(Password, User_Type, Staff_Id) 
                                        VALUES (:Password, :User_Type, :Staff_Id)";
            $insert_staff_users = $this->conn->prepare($sql_insert_staff_users);
            $insert_staff_users->bindParam(':Password', $hashed_password);
            $insert_staff_users->bindParam(':User_Type', $Staff_Type);
            $insert_staff_users->bindParam(':Staff_Id', $Staff_Id);
            

            if ($insert_staff_users->execute()) {
                echo 'Registration Successful';
            }
            else {
                $this->conn->rollBack();
                echo 'Registration Failed';
            }

            try {
                $send_password = new SendPassword();
                $send_password->send_password($Staff_Last_Name, $Staff_First_Name, $Staff_Middle_Name, $Staff_Contact_Number, $password);
            }
            catch (Exception $e) {
                $this->conn->rollBack();
                echo 'Failed to send password: ' . $e->getMessage();
            }

            $this->conn->commit();
        }

        catch (PDOException $e) {
            $this->conn->rollBack();
            echo 'Error: ' . $e->getMessage();
        }
    }

    private function generatePassword() {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }
        return $password;
    }
}
?>

