<?php
session_start();
require_once 'dbconnection.php';

Class VerifyLogin {
    protected $conn;
    
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    public function verify_login($User_Typed_Phone_Number, $User_Typed_Password) {
        $User_Password = null;
        
        $sql_find_information = "SELECT users.*, staffs.* FROM users 
                                JOIN staffs ON users.Staff_Id = staffs.Staff_Id
                                WHERE staffs.Staff_Contact_Number = :Contact_Number;";
        $find_information = $this->conn->prepare($sql_find_information);
        $find_information->bindparam(':Contact_Number', $User_Typed_Phone_Number);
        if ($find_information->execute()) { 
            $result = $find_information->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $User_Password = $result['Password'];
                $User_Password = trim($User_Password);
                $User_Typed_Password = trim($User_Typed_Password);
                if (password_verify($User_Typed_Password, $User_Password)) {

                    $_SESSION['User-Id'] = $result['User_Id'];
                    $_SESSION['Staff-id'] = $result['Staff_Id'];
                    $_SESSION['First-Name'] = $result['Staff_First_Name'];
                    $_SESSION['Last-Name'] = $result['Staff_Last_Name'];
                    $_SESSION['Middle-Name'] = $result['Staff_Middle_Name'];
                    $_SESSION['Contact-Number'] = $result['Staff_Contact_Number'];
                    $_SESSION['User-Type'] = $result['User_Type'];

                    //replace with change location and add session shit
                    echo"Login Successful";
                    exit();
                }
                
                else {
                    //should still input an alert for the user to know the password was invalid
                    echo "Invalid password.";
                }
            } else {
                echo "User not found.";
            }
        }
    }
}

?>

