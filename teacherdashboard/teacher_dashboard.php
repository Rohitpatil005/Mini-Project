<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['loginUser'])) {
    header("Location: ../teacherindex.php");
    exit();
}

require '../db.php';

// Fetch teacher details
$stmt = $conn->prepare("SELECT * FROM teacher WHERE teacher_id = ?");
$stmt->bind_param("s", $_SESSION['loginUser']);
$stmt->execute();
$teacher = $stmt->get_result()->fetch_assoc();

if (!$teacher) {
    die("Teacher record not found");
}

// Fetch announcements posted by this teacher
$ann_stmt = $conn->prepare("SELECT * FROM announcements 
                            WHERE teacher_id = ? AND expiry_date >= CURDATE() 
                            ORDER BY created_at DESC LIMIT 3");
$ann_stmt->bind_param("s", $_SESSION['loginUser']);
$ann_stmt->execute();
$announcements = $ann_stmt->get_result();

// Fetch courses assigned to this teacher
$courses_stmt = $conn->prepare("SELECT course_id, elective_name FROM elective_course
                                WHERE assigned_teacher = ?");
$courses_stmt->bind_param("s", $_SESSION['loginUser']);
$courses_stmt->execute();
$courses = $courses_stmt->get_result();

// Fetch assignments created by this teacher
$assignment_stmt = $conn->prepare("
    SELECT a.Assessment_ID, a.Type, a.Course_ID, a.Max_Marks, a.Weightage
    FROM assignment a
    JOIN elective_course c ON a.Course_ID = c.course_id
    WHERE c.assigned_teacher = ?
");
$assignment_stmt->bind_param("s", $_SESSION['loginUser']);
$assignment_stmt->execute();
$assignments = $assignment_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-gradient-to-b from-purple-800 to-blue-600 text-white p-5 shadow-lg">
            <h2 class="text-3xl font-bold mb-5">Course Portal</h2>
            <ul class="space-y-4 text-lg">
                <li><a href="teacher_dashboard.php" class="hover:text-gray-300">🏠 Dashboard</a></li>
                <li><a href="coursemanagement.php" class="hover:text-gray-300">📚 Course Management</a></li>
                <li><a href="Student_Interaction.php" class="hover:text-gray-300">🎓 Student Interaction</a></li>
                <li><a href="Grade&Assesment.php" class="hover:text-gray-300">📝 Grading</a></li>
                <li><a href="settings.php" class="hover:text-gray-300">⚙️ Settings</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <!-- Header -->
            <header class="flex justify-between items-center bg-white p-4 rounded shadow-md mb-6">
                <h1 class="text-3xl font-semibold">Welcome, <?= htmlspecialchars($teacher['teacher_Name'] ?? 'Teacher') ?>!</h1>
                <a href="../index.php">
                    <button class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">Logout</button>
                </a>
            </header>

            <!-- Quick Actions -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold mb-3">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <a href="announcement.php">
                        <div class="bg-gradient-to-r from-purple-800 to-blue-600 text-white p-5 rounded-lg shadow-lg transition hover:scale-105">
                            <h3 class="text-lg font-semibold">📢 Announcements</h3>
                            <p>Check latest updates</p>
                        </div>
                    </a>
                    <a href="new_course.php">
                        <div class="bg-gradient-to-r from-purple-800 to-blue-600 text-white p-5 rounded-lg shadow-lg transition hover:scale-105">
                            <h3 class="text-lg font-semibold">📜 New Courses</h3>
                            <p>Explore latest additions</p>
                        </div>
                    </a>
                    <a href="schedule.php">
                        <div class="bg-gradient-to-r from-purple-800 to-blue-600 text-white p-5 rounded-lg shadow-lg transition hover:scale-105">
                            <h3 class="text-lg font-semibold">📅 Schedule</h3>
                            <p>View your class timetable</p>
                        </div>
                    </a>
                    <a href="Grade&Assesment.php">
                        <div class="bg-gradient-to-r from-purple-800 to-blue-600 text-white p-5 rounded-lg shadow-lg transition hover:scale-105">
                            <h3 class="text-lg font-semibold">📝 Grade Management</h3>
                            <p>View and update student grades</p>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Announcements -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold mb-2">📢 Announcements</h2>
                <div class="space-y-2">
                    <?php if ($announcements->num_rows > 0): ?>
                        <?php while ($row = $announcements->fetch_assoc()): ?>
                            <div class="bg-white p-4 shadow rounded">
                                <h3 class="font-bold"><?= htmlspecialchars($row['title']) ?></h3>
                                <p><?= htmlspecialchars($row['description']) ?></p>
                                <small class="text-gray-500">Expires: <?= $row['expiry_date'] ?></small>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-gray-500">No current announcements.</p>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Your Courses -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold mb-2">📘 Your Courses</h2>
                <ul class="list-disc list-inside">
                    <?php if ($courses->num_rows > 0): ?>
                        <?php while ($course = $courses->fetch_assoc()): ?>
                            <li><?= htmlspecialchars($course['elective_name']) ?> (<?= $course['course_id'] ?>)</li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li class="text-gray-500">No courses assigned.</li>
                    <?php endif; ?>
                </ul>
            </section>

            <!-- Assignments Table -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold mb-2">📝 Assignments</h2>
                <?php if ($assignments->num_rows > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded shadow overflow-hidden">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Type</th>
                                    <th class="px-4 py-2">Course</th>
                                    <th class="px-4 py-2">Max Marks</th>
                                    <th class="px-4 py-2">Weightage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($a = $assignments->fetch_assoc()): ?>
                                    <tr class="border-t">
                                        <td class="px-4 py-2"><?= $a['Assessment_ID'] ?></td>
                                        <td class="px-4 py-2"><?= $a['Type'] ?></td>
                                        <td class="px-4 py-2"><?= $a['Course_ID'] ?></td>
                                        <td class="px-4 py-2"><?= $a['Max_Marks'] ?></td>
                                        <td class="px-4 py-2"><?= $a['Weightage'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500">No assignments created yet.</p>
                <?php endif; ?>
            </section>

            <!-- Recent Activity -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold mb-3"> Recent Activity</h2>
                <div class="bg-white p-5 rounded-lg shadow-lg">
                    <p>📩 New message from Student 2</p>
                    <p>✅ Assignment graded for Student 3</p>
                    <p>📚 New course materials uploaded</p>
                </div>
            </section>

            <!-- Quick Links -->
            <section>
                <h2 class="text-xl font-semibold mb-3">🔗 Quick Links</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="reports.php" class="bg-blue-500 text-white p-4 rounded-lg shadow-lg text-center">📊 View Reports</a>
                    <a href="support.php" class="bg-green-500 text-white p-4 rounded-lg shadow-lg text-center">💬 Support & Help</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
