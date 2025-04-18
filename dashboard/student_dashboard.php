<?php
// Start session and check authentication
session_start();

// Debugging - add this at the top
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Redirect if not logged in
if (!isset($_SESSION['loginUser'])) {
    header("Location: ../index.php");
    exit();
}

// Database connection
require '../db.php';

// Fetch student details
$stmt = $conn->prepare("SELECT * FROM student WHERE Student_ID = ?");
$stmt->bind_param("s", $_SESSION['loginUser']);
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
    <title>Course Registration System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom animation for hover effects */
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 transition-all">
    <div class="flex h-screen">

        <!-- Navigation Sidebar - Using your improved design -->
        <nav class="w-64 bg-gray-800 text-white p-5 shadow-lg transition-transform duration-300">
            <h2 class="text-3xl font-bold mb-5">Course Portal</h2>
            <ul class="space-y-4 text-lg">
                <li><a href="student_dashboard.php" class="hover:text-gray-400 flex items-center">🏠 Dashboard</a></li>
                <li><a href="courses.php" class="hover:text-gray-400 flex items-center">📚 Courses</a></li>
                <li><a href="my_courses.php" class="hover:text-gray-400 flex items-center">🎓 My Courses</a></li>
                <li><a href="results.php" class="hover:text-gray-400 flex items-center">📜 Results</a></li>
                <li><a href="settings.php" class="hover:text-gray-400 flex items-center">⚙️ Settings</a></li>
            </ul>
        </nav>

        <div class="flex-1 p-6 overflow-y-auto">
            <!-- Header with your design -->
            <header class="flex justify-between items-center bg-gray-800 p-4 rounded shadow-md">
                <div class="flex items-center space-x-4">
                    <img src="profile.jpg" alt="Student Avatar" class="w-12 h-12 rounded-full">
                    <h1 class="text-white text-3xl font-semibold">Welcome, <?= htmlspecialchars($student['Name']) ?></h1>
                </div>
                <div>
                    <a href="../logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 ml-2">Logout</a>
                </div>
            </header>

            <!-- Quick Actions Section with your design -->
            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg hover-scale cursor-pointer">
                        <a href="announcements.php" class="block">
                            <h3 class="text-lg font-semibold">📢 Announcements</h3>
                            <p>Check latest updates</p>
                        </a>
                    </div>
                    <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg hover-scale cursor-pointer">
                        <a href="new_courses.php" class="block">
                            <h3 class="text-lg font-semibold">📜 New Courses</h3>
                            <p>Explore latest additions</p>
                        </a>
                    </div>
                    <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg hover-scale cursor-pointer">
                        <a href="schedule.php" class="block">
                            <h3 class="text-lg font-semibold">📅 Schedule</h3>
                            <p>View your class timetable</p>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Announcements Section - Dynamic from database -->
            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">Recent Announcements</h2>
                <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg">
                    <?php if ($announcements->num_rows > 0): ?>
                        <div class="space-y-4">
                            <?php while ($announcement = $announcements->fetch_assoc()): ?>
                                <div class="border-b border-gray-700 pb-3 last:border-0 last:pb-0">
                                    <h3 class="font-semibold text-lg"><?= htmlspecialchars($announcement['title']) ?></h3>
                                    <p class="text-gray-300"><?= htmlspecialchars($announcement['description']) ?></p>
                                    <p class="text-sm text-gray-400 mt-1">
                                        Posted: <?= date('M j, Y', strtotime($announcement['created_at'])) ?>
                                        <?php if ($announcement['expiry_date']): ?>
                                            | Expires: <?= date('M j, Y', strtotime($announcement['expiry_date'])) ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p>No current announcements</p>
                    <?php endif; ?>
                </div>
            </section>

            <!-- My Courses Section - Dynamic from database -->
            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">My Courses</h2>
                <?php if ($courses->num_rows > 0): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php while ($course = $courses->fetch_assoc()): ?>
                            <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg hover-scale">
                                <h3 class="text-lg font-semibold">📚 <?= htmlspecialchars($course['Elective_Name']) ?></h3>
                                <p class="text-gray-300 mt-2">
                                    Enrolled: <?= date('M j, Y', strtotime($course['Entollment_Date'])) ?>
                                </p>
                                <a href="course_details.php?name=<?= urlencode($course['Elective_Name']) ?>" 
                                   class="inline-block mt-3 text-blue-400 hover:text-blue-300">
                                    View Details →
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg">
                        <p>You haven't enrolled in any courses yet.</p>
                        <a href="courses.php" class="inline-block mt-3 text-blue-400 hover:text-blue-300">
                            Browse Available Courses →
                        </a>
                    </div>
                <?php endif; ?>
            </section>

            <!-- Performance Tracking - Dynamic from database -->
            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">Performance Tracking</h2>
                <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <p class="mb-2">Your Overall Progress: <strong><?= round($progress, 1) ?>%</strong></p>
                        <div class="w-full bg-gray-700 rounded-full h-4">
                            <div class="bg-blue-500 h-4 rounded-full" 
                                 style="width: <?= min(100, max(0, $progress)) ?>%"></div>
                        </div>
                    </div>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
                        Download Report (PDF)
                    </button>
                </div>
            </section>

            <!-- AI Recommendations Section -->
            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">AI Course Recommendations</h2>
                <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg">
                    <p>Based on your interests and past selections, we recommend:</p>
                    <div class="mt-3 space-y-3">
                        <div class="p-3 bg-gray-700 rounded-lg hover-scale cursor-pointer">
                            <strong>Advanced AI & ML</strong> - Dive deeper into machine learning algorithms
                        </div>
                        <div class="p-3 bg-gray-700 rounded-lg hover-scale cursor-pointer">
                            <strong>Cloud Computing</strong> - Learn about AWS, Azure, and GCP
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>