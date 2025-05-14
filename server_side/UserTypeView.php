<?php
declare(strict_types=1);

class UserTypeView {
    
    public function __construct() {
        $this->display();
    }
    private function display() {
        $userType = "";
        if (isset($_SESSION['User']['User-Type'])  && $_SESSION['User']['User-Type'] == 4) {
            $userType = "User";
        }
        else if(isset($_SESSION['Admin']['User-Type']) && $_SESSION['Admin']['User-Type'] == 1) {
            $userType = "Admin";
        }
        else  {
            $userType = "Teacher";
        }
        if (!empty($userType)) {
            echo "<p> $userType</p>";
        }
        else {
            echo "<p> Unknown </p>";
        }
    }
}