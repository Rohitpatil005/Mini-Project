<?php
// Start session and check authentication
session_start();

// Debugging - add this at the top
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Redirect if not logged in
if (!isset($_SESSION['loginUser'])) {
    header("Location: ../index.php"); // Relative URL path
    exit();
}

// Database connection
require '../db.php'; // Make sure this path is correct

// Fetch student details
$stmt = $conn->prepare("SELECT * FROM student WHERE Student_ID = ?");
$stmt->bind_param("s", $_SESSION['loginUser']); // Changed to match your login system
$stmt->execute();
$student = $stmt->get_result()->fetch_assoc();

if (!$student) {
    die("Student record not found");
}

// Fetch announcements
$announcements = $conn->query("SELECT * FROM announcements WHERE expiry_date >= CURDATE() ORDER BY created_at DESC LIMIT 3");

// Fetch enrolled courses
$courses_stmt = $conn->prepare("
    SELECT elective_course.Elective_Name, enrollment.Entollment_Date 
    FROM enrollment 
    JOIN elective_course ON enrollment.Course_ID = elective_course.Course_ID 
    WHERE Student_ID = ?
");
$courses_stmt->bind_param("s", $_SESSION['loginUser']);
$courses_stmt->execute();
$courses = $courses_stmt->get_result();

// Calculate progress
$progress_stmt = $conn->prepare("
    SELECT AVG(percentage) AS avg_progress 
    FROM results 
    WHERE student_id = ?
");
$progress_stmt->bind_param("s", $_SESSION['loginUser']);
$progress_stmt->execute();
$progress_result = $progress_stmt->get_result()->fetch_assoc();
$progress = $progress_result['avg_progress'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 transition-all">
    <div class="flex h-screen">
        <!-- Navigation Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-4">
            <div class="text-xl font-bold mb-8">Electives Management</div>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="#" class="block p-2 bg-gray-700 rounded">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="courses.php" class="block p-2 hover:bg-gray-700 rounded">My Courses</a>
                    </li>
                    <li class="mb-2">
                        <a href="grades.php" class="block p-2 hover:bg-gray-700 rounded">Grades</a>
                    </li>
                    <li class="mb-2">
                        <a href="profile.php" class="block p-2 hover:bg-gray-700 rounded">Profile</a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <div class="flex-1 p-6">
            <header class="flex justify-between items-center bg-gray-800 p-4 rounded shadow-md">
                <div class="flex items-center space-x-4">
                    <img src="profile.jpg" alt="Student Avatar" class="w-12 h-12 rounded-full">
                    <h1 class="text-white text-3xl font-semibold">Welcome, <?= htmlspecialchars($student['Name']) ?></h1>
                </div>
                <div>
                    <a href="../logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 ml-2">Logout</a>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Announcements Card -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-4">Announcements</h2>
                    <?php if ($announcements->num_rows > 0): ?>
                        <ul class="space-y-3">
                            <?php while ($announcement = $announcements->fetch_assoc()): ?>
                                <li class="border-b pb-2">
                                    <h3 class="font-medium"><?= htmlspecialchars($announcement['title']) ?></h3>
                                    <p class="text-sm text-gray-600"><?= htmlspecialchars($announcement['content']) ?></p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        Posted: <?= date('M j, Y', strtotime($announcement['created_at'])) ?>
                                    </p>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p>No current announcements</p>
                    <?php endif; ?>
                </div>

                <!-- Courses Card -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-4">My Courses</h2>
                    <?php if ($courses->num_rows > 0): ?>
                        <ul class="space-y-3">
                            <?php while ($course = $courses->fetch_assoc()): ?>
                                <li class="border-b pb-2">
                                    <h3 class="font-medium"><?= htmlspecialchars($course['Elective_Name']) ?></h3>
                                    <p class="text-sm text-gray-600">
                                        Enrolled: <?= date('M j, Y', strtotime($course['Entollment_Date'])) ?>
                                    </p>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p>No enrolled courses</p>
                    <?php endif; ?>
                </div>

                <!-- Progress Card -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-4">My Progress</h2>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-blue-600 h-4 rounded-full" 
                             style="width: <?= min(100, max(0, $progress)) ?>%"></div>
                    </div>
                    <p class="mt-2 text-center"><?= round($progress, 1) ?>% Complete</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>