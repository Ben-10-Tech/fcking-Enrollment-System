<?php
declare(strict_types=1);
require_once __DIR__ . '/../server_side/subjectsModel.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $subjectsQuery = new subjectsModel();

    $subjectName = $_POST['subject-name'];
    $subjectLevel = (int)$_POST['subject-level'];

        if (empty($subjectName)) {
            echo"<script> 
                alert('Subject name cannot be empty'); 
                window.location.href = '../adminPages/Admin_Subjects.php'
            </script>";
            exit();
        }
        $convertedName = strtoupper($subjectName);
        if (isset($_POST['levels'])) {
            $subjects = $_POST['levels'];
            foreach($subjects as $subject) {
                $convertedSubject = strtoupper($subject);
                if ($subjectsQuery->insertSubjectAndLevel($convertedSubject, $subjectLevel)) {
                    header("Location: ../adminPages/Admin_Subjects.php" );
                    exit();
                }
                else {
                    echo "Failed to insert subject and level";
                }
            }
        }
        else {
            if ($subjectsQuery->insertSubjectAndLevel($convertedName, $subjectLevel)) {
                header("Location: ../adminPages/Admin_Subjects.php");
                exit();
            }
            else {
                echo "Failed to insert subject and level";
            }
        }
    }
}