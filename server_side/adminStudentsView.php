<?php 

declare(strict_types=1);

require_once __DIR__ . '/../server_side/studentsModel.php';

class adminStudentsView {
    protected $studentsModel;

    public function __construct() {
        $students = new studentsModel();
        $this->studentsModel = $students;
    }

    public function displayStudents() {
        $data = $this->studentsModel->getAllStudents();
        foreach($data as $rows) {
            $section = $rows['Section_Name'] === null ? 'Section is not set' : htmlspecialchars($rows['Section_Name']);
            $middleInitial = $rows['Student_Middle_Name'] === null ? '' : substr($rows['Student_Middle_Name'], 0, 1) . ".";

            echo '<tr class="student-rows"> 
                <td>' . htmlspecialchars($rows['Student_Last_Name']).','. 
                htmlspecialchars($rows['Student_First_Name']) .' '.
                $middleInitial .
                '</td>
                <td>' .$rows['Learner_Reference_Number'].' </td>
                <td>' . htmlspecialchars($rows['Grade_Level']).' </td>
                <td> ' . $section .'</td>
                <td> <button class="view-student" data-id="'.$rows['Enrollee_Id'].'"> View Information </button> </td>
            </tr>';
        }
    }
}
