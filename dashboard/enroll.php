<?php
session_start();
require '../db.php';

if (!isset($_SESSION['loginUser'])) {
    header("HTTP/1.1 401 Unauthorized");
    exit(json_encode(['success' => false, 'message' => 'Not logged in']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_SESSION['loginUser'];
    $courseId = $_POST['course_id'] ?? null;

    if (!$courseId) {
        exit(json_encode(['success' => false, 'message' => 'Invalid course']));
    }

    try {
        // Check existing enrollment
        $checkStmt = $conn->prepare("SELECT * FROM enrollment 
                                   WHERE Student_ID = ? AND Course_ID = ?");
        $checkStmt->bind_param("is", $studentId, $courseId);
        $checkStmt->execute();
        
        if ($checkStmt->get_result()->num_rows > 0) {
            exit(json_encode(['success' => false, 'message' => 'Already enrolled']));
        }

        // Insert enrollment
        $insertStmt = $conn->prepare("INSERT INTO enrollment 
                                    (Entollment_Date, Status, Course_ID, Student_ID) 
                                    VALUES (CURDATE(), 1, ?, ?)");
        $insertStmt->bind_param("si", $courseId, $studentId);
        
        if ($insertStmt->execute()) {
            exit(json_encode(['success' => true]));
        } else {
            exit(json_encode(['success' => false, 'message' => 'Database error']));
        }
        
    } catch (Exception $e) {
        exit(json_encode(['success' => false, 'message' => 'Server error']));
    }
}
?>