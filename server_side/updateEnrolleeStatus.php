<?php

declare(strict_types=1);
require_once __DIR__ . '/../server_side/EnrolleesModel.php';
require_once __DIR__ . '/../server_side/studentsModel.php';

header("Content-Type: application/json");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
    $updateStatus = new getEnrollees();
    $students = new studentsModel();

    $enrolleeId = $_POST['id'] ?? null;
    $status = (int)$_POST['status'] ?? null;

    if($enrolleeId && $status && $status === 4) {
        $update = $updateStatus->updateEnrollee($enrolleeId, $status);
        if($update) {
            $insert = $students->insertEnrolleeToStudent($enrolleeId);
            if($insert) {
                echo json_encode($insert);
                exit();
            }
        else {
            echo json_encode(['success' => false, 'message'=> 'inserting enrollee failed']);
        }
        }
        echo json_encode(['success' => true, 'message'=> "Insert successful"]);
        exit();
    }
    else {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
        exit();
    }

    }
    catch(PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit();
    }
}
else {
    echo json_encode(['success' => false, 'message'=> 'Invalid request method']);
}