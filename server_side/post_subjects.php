<?php
declare(strict_types=1);
require_once __DIR__ . '/../server_side/subjectsModel.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $subjectsQuery = new subjectsModel();

    $subjectName = $_POST['subject-name'];
    $subjectLevel = (int)$_POST['subject-level'];

    $convertedName = strtoupper($subjectName);
    if (isset($_POST['levels'])) {
        $subjects = $_POST['levels'];
        foreach($subjects as $subject) {
            $convertedSubject = strtoupper($subject);
            $subjectsQuery->insertSubjectAndLevel($convertedSubject, $subjectLevel);
        }
    }
    else {
        $subjectsQuery->insertSubjectAndLevel($convertedName, $subjectLevel);
    }
}