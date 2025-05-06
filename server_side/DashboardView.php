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

    public function displayPendingEnrolleesInformation() {
        $pendingEnrollees = $this->dashboard->PendingEnrolleesInformation();
        
        if (!empty($pendingEnrollees)) {
            for ($i = 0; $i < 5; $i++) {
                $Student_Full_Name = $pendingEnrollees[$i]['Student_First_Name'] . " " . $pendingEnrollees[$i]['Student_Middle_Name'] . " " . $pendingEnrollees[$i]['Student_Last_Name'];
                $Enrolling_Grade_Level = $pendingEnrollees[$i]['Enrolling_Grade_Level'];
                $Learner_Reference_Number = $pendingEnrollees[$i]['Learner_Reference_Number'];
                echo '
                    <tr>
                        <td>' . $Learner_Reference_Number . '</td>
                        <td>' . $Student_Full_Name . '</td>
                        <td>' . $Enrolling_Grade_Level . '</td>
                    </tr>';
            }
        } else {

        }

    }


}

?>