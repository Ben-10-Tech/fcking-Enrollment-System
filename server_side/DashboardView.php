<?php
require_once 'DashboardModel.php';

class DashboardView {
    protected $dashboard;

    public function __construct() {
        $this->dashboard = new DashboardModel();
    }

    public function displayEnrolledStudents() {
        $enrolled = $this->dashboard->EnrolledStudents();
        echo $enrolled;
    }

    public function displayPendingStudents() {
        $pending = $this->dashboard->PendingStudents();
        echo $pending;
    }

    public function displayToFollowStudents() {
        $toFollow = $this->dashboard->FollowUpStudents();
        echo $toFollow;
    }

    public function displayTemporarilyEnrolledStudents() {
        $temporary = $this->dashboard->TemporarilyEnrolledStudents();
        echo $temporary;
    }
}



?>