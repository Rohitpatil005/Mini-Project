<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['professor_id'])) {
        echo json_encode(["status" => "error", "message" => "Unauthorized"]);
        exit;
    }

    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $status = $_POST['status']; // 1 = present, 0 = absent
    $date = date('Y-m-d');

    // Check if already marked
    $check = $conn->prepare("SELECT * FROM enrollment WHERE Student_ID = ? AND Course_ID = ? AND Entollment_Date = ?");
    $check->bind_param("iss", $student_id, $course_id, $date);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Attendance already marked for today"]);
    } else {
        $stmt = $conn->prepare("INSERT INTO enrollment (Student_ID, Course_ID, Entollment_Date, Status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $student_id, $course_id, $date, $status);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Attendance marked"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to mark attendance"]);
        }
    }
}
?>
