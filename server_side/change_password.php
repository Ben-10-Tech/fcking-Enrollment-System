<?php
require_once 'dbconnection.php';
session_start();    

class ChangePassword {
    protected $conn;
    
    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    public function change_password($User_Typed_Password, $User_New_Password, $User_New_Password_Confirm) {
        $User_Id = $_SESSION['User-Id'];
        $sql_find_information = "SELECT users.*, registrations.* FROM users 
                                    JOIN registrations ON users.Registration_Id = registrations.Registration_Id
                                    WHERE users.User_Id = :User_Id;";
        $find_information = $this->conn->prepare($sql_find_information);
        $find_information->bindparam(':User_Id', $User_Id);
        if ($find_information->execute()) {
            $result = $find_information->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $User_Password = $result['Password'];
                $User_Password = trim($User_Password);
                $User_Typed_Password = trim($User_Typed_Password);
                if (password_verify($User_Typed_Password, $User_Password)) {
                    if ($User_New_Password === $User_New_Password_Confirm) {
                        $hashed_password = password_hash($User_New_Password, PASSWORD_DEFAULT);

                        $sql_update_password = "UPDATE users SET Password = :Password WHERE User_Id = :User_Id;";
                        $update_password = $this->conn->prepare($sql_update_password);
                        $update_password->bindparam(':Password', $hashed_password);
                        $update_password->bindparam(':User_Id', $User_Id);
                        
                        if ($update_password->execute()) {
                            return [
                                'success' => true,
                                'message' => 'Password changed successfully.'
                            ];
                        } 
                        
                        else {
                            return  [
                                'sucess' => false,
                                'message' => 'Failed to change password.'
                            ];
                        }
                    } 
                    
                    else {
                        return [
                            'success' => false,
                            'message' => 'New password and confirmation do not match.'
                        ];  
                    }
                }
                
                else {
                    return[
                        'success' => false,
                        'message' => "Incorrect password."
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'User not found.'
                ];
            }
        }
    }
}