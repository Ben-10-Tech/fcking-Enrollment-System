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
    public function displayPendingEnrolleesInformation() {
        $pendingEnrollees = $this->dashboard->PendingEnrolleesInformation();
        
        if (!empty($pendingEnrollees)) {
            foreach ($pendingEnrollees as $rows) {
                $Student_Full_Name = $rows['Student_First_Name'] . " " . $rows['Student_Middle_Name'] . " " . $rows['Student_Last_Name'];
                echo '
                    <tr>
                        <td>' . $rows['Learner_Reference_Number'] . '</td>
                        <td>' . $Student_Full_Name . '</td>
                        <td>' . $rows['E_Grade_Level'] . '</td>
                    </tr>';
            }
        } else {

        }

    }


}

?>