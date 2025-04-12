<?php
session_start();
require 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit();
}

// Fetch student details
$stmt = $conn->prepare("SELECT * FROM student WHERE Student_ID = ?");
$stmt->bind_param("i", $_SESSION['student_id']);
$stmt->execute();
$student = $stmt->get_result()->fetch_assoc();

// Fetch announcements
$announcements = $conn->query("SELECT * FROM announcements WHERE expiry_date >= CURDATE() ORDER BY created_at DESC LIMIT 3");

// Fetch enrolled courses
$courses_stmt = $conn->prepare("
    SELECT elective_course.Elective_Name, enrollment.Entollment_Date 
    FROM enrollment 
    JOIN elective_course ON enrollment.Course_ID = elective_course.Course_ID 
    WHERE Student_ID = ?
");
$courses_stmt->bind_param("i", $_SESSION['student_id']);
$courses_stmt->execute();
$courses = $courses_stmt->get_result();

// Calculate progress (example calculation)
$progress_stmt = $conn->prepare("
    SELECT AVG(percentage) AS avg_progress 
    FROM results 
    WHERE student_id = ?
");
$progress_stmt->bind_param("i", $_SESSION['student_id']);
$progress_stmt->execute();
$progress_result = $progress_stmt->get_result()->fetch_assoc();
$progress = $progress_result['avg_progress'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Keep existing head content -->
</head>
<body class="bg-gray-100 text-gray-800 transition-all">
    <div class="flex h-screen">
        <!-- Keep existing navigation -->
        
        <div class="flex-1 p-6">
            <header class="flex justify-between items-center bg-gray-800 p-4 rounded shadow-md">
                <div class="flex items-center space-x-4">
                    <img src="profile.jpg" alt="Student Avatar" class="w-12 h-12 rounded-full">
                    <h1 class="text-white text-3xl font-semibold">Welcome, <?= htmlspecialchars($student['Name']) ?></h1>
                </div>
                <div>
                    <a href="logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 ml-2">Logout</a>
                </div>
            </header>

            <!-- Rest of the dashboard content remains the same -->
            <!-- Make sure to update the PHP loops to use the fetched data -->
        </div>
    </div>
</body>
</html>