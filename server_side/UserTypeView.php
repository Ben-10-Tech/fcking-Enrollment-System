<?php
declare(strict_types=1);

class UserTypeView {
    
    public function __construct() {
        $this->display();
    }
    private function display() {
        $userType = "";
        if (isset($_SESSION['User']['User-Type'])  && $_SESSION['User']['User-Type'] == 3) {
            $userType = "User";
        }
        else if(isset($_SESSION['Admin']['User-Type']) && $_SESSION['Admin']['User-Type'] == 2) {
            $userType = "Teacher";
        }
        else  {
            $userType = "Admin";
        }
        if (!empty($userType)) {
            echo "<p> $userType</p>";
        }
        else {
            echo "<p> Unknown </p>";
        }
    }
}