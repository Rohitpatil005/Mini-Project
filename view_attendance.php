<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['student_id']) && !isset($_SESSION['professor_id'])) {
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $student_id = $_GET['student_id'];

    $stmt = $conn->prepare("SELECT Course_ID, Entollment_Date, Status FROM enrollment WHERE Student_ID = ?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $attendance = [];

    while ($row = $result->fetch_assoc()) {
        $attendance[] = $row;
    }

    echo json_encode(["status" => "success", "data" => $attendance]);
}
?>
