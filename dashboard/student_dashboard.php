<?php
session_start();
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: ../index.php");
    exit();
}

// Fetch student details
$student_id = $_SESSION['student_id'];
$stmt = $conn->prepare("SELECT * FROM student WHERE Student_ID = ?");
$stmt->bind_param("i", $student_id);
$stmt->execute();
$student = $stmt->get_result()->fetch_assoc();

if (!$student) {
    // Student not found in database
    session_destroy();
    header("Location: ../index.php");
    exit();
}

// [Rest of your dashboard code remains the same]
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

        <nav class="w-64 bg-gray-800 text-white p-5 shadow-lg transition-transform duration-300">
            <h2 class="text-3xl font-bold mb-5">Student Portal</h2>
            <ul class="space-y-4 text-lg">
                <li><a href="student_dashboard.php" class="hover:text-gray-400 flex items-center">🏠 Dashboard</a></li>
                <li><a href="courses.php" class="hover:text-gray-400 flex items-center">📚 Courses</a></li>
                <li><a href="my_courses.php" class="hover:text-gray-400 flex items-center">🎓 My Courses</a></li>
                <li><a href="result.php" class="hover:text-gray-400 flex items-center">📜 Results</a></li>
                <li><a href="settings.php" class="hover:text-gray-400 flex items-center">⚙️ Settings</a></li>
            </ul>
        </nav>

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

            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">📢 Latest Announcements</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php while($announcement = $announcements->fetch_assoc()): ?>
                    <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold"><?= htmlspecialchars($announcement['title']) ?></h3>
                        <p class="text-gray-400 mt-2"><?= htmlspecialchars($announcement['description']) ?></p>
                        <p class="text-sm text-gray-500 mt-2">Expires: <?= $announcement['expiry_date'] ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
            </section>

            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">📚 Current Courses</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php while($course = $courses->fetch_assoc()): ?>
                    <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold"><?= htmlspecialchars($course['Elective_Name']) ?></h3>
                        <p class="text-gray-400 mt-2">Enrolled: <?= $course['Entollment_Date'] ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
            </section>

            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">📊 Academic Progress</h2>
                <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-lg">Overall Progress: <?= $progress ?>%</p>
                            <div class="w-full bg-gray-700 rounded-full h-2.5 mt-2">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: <?= $progress ?>%"></div>
                            </div>
                        </div>
                        <a href="report.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            View Full Report
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>