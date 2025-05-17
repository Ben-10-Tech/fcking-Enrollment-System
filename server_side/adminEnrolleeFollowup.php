<?php
declare(strict_types=1);
session_start();

require_once __DIR__ .'/../server_side/EnrolleesModel.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    echo json_encode(['success'=> false, 'message'=> 'Unauthorized: no admin session']);
    exit();
}

if (!isset($_SESSION['Admin']['Staff-Id'])) {
    echo json_encode([ 'success'=> false,'message'=> 'Unauthorized: no admin session']);
    exit();
}

if (!isset($_POST['id'], $_POST['status'], $_POST['description'])) {
    echo json_encode(['success'=> false, 'message'=> 'Missing POST data']);
    exit();
}

$enrolleeModel = new getEnrollees();

$staffId = $_SESSION['Admin']['Staff-Id'];
$enrolleeId = (int) $_POST['id'];
$status = (int)$_POST['status'];
$description = $_POST['description'];

$date = date('Ymd');
$time = time();

$statusCode = ($status === 1) ? "F" : "D";
$transactionCode = $statusCode . "-" . $date . "-" . $time;

if (!isset($_POST['reasons'])) {
    echo json_encode(['succes'=> false, 'message'=> 'Missing reasons' ]);
    exit();
}

$reasons = $_POST['reasons'];

$success = true;
foreach ($reasons as $value) {
    $insert = $enrolleeModel->insertEnrolleeTransaction($enrolleeId, $transactionCode, $staffId, $value, $description);
    if(!$insert){
        $success = false;
        break;
    }
}
    if ($success) {
        if($enrolleeModel->updateEnrollee($enrolleeId, $status)) {
            echo json_encode(['success'=> false, 'message' => 'Insert failed']);
            exit();
        }
        else {
            echo json_encode(['success' => false, 'message' => 'Insert failed']);            
            exit();
        }
    }
    else {
        echo json_encode(['success' => false, 'message'=> 'Action failed']);
        exit();
    }