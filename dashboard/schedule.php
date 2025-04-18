<?php
session_start();
require '../db.php';

if (!isset($_SESSION['loginUser'])) {
    header("Location: ../index.php");
    exit();
}

// Fetch schedule with course names and locations
$schedule = $conn->query("
    SELECT s.Day, s.Start_Time, s.End_Time, 
           ec.Elective_Name, l.Location_Name
    FROM schedule s
    JOIN elective_course ec ON s.Course_ID = ec.Course_ID
    JOIN location l ON s.Location_ID = l.Location_ID
    ORDER BY 
        FIELD(s.Day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
        s.Start_Time
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <nav class="w-64 bg-gray-800 text-white p-5 shadow-lg">
            <h2 class="text-3xl font-bold mb-5">Course Portal</h2>
            <ul class="space-y-4 text-lg">
                <li><a href="student_dashboard.php" class="hover:text-gray-400">🏠 Dashboard</a></li>
                <li><a href="announcement.php" class="hover:text-gray-400">📢 Announcements</a></li>
                <li><a href="courses.php" class="hover:text-gray-400">📚 Courses</a></li>
            </ul>
        </nav>

        <div class="flex-1 p-6 overflow-y-auto">
            <header class="flex justify-between items-center bg-gray-800 p-4 rounded shadow-md mb-6">
                <h1 class="text-white text-3xl font-semibold">📅 Class Schedule</h1>
                <a href="../logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">Logout</a>
            </header>

            <section class="mt-6">
                <div class="bg-white p-5 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-3">Your Weekly Timetable</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-800 text-white">
                                    <th class="p-3 text-left">Day</th>
                                    <th class="p-3 text-left">Time</th>
                                    <th class="p-3 text-left">Course</th>
                                    <th class="p-3 text-left">Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($schedule->num_rows > 0): ?>
                                    <?php $rowCount = 0; ?>
                                    <?php while($class = $schedule->fetch_assoc()): ?>
                                        <tr class="<?= $rowCount % 2 === 0 ? 'bg-gray-50' : 'bg-white' ?>">
                                            <td class="p-3 border"><?= htmlspecialchars($class['Day']) ?></td>
                                            <td class="p-3 border">
                                                <?= date('g:i A', strtotime($class['Start_Time'])) ?> - 
                                                <?= date('g:i A', strtotime($class['End_Time'])) ?>
                                            </td>
                                            <td class="p-3 border"><?= htmlspecialchars($class['Elective_Name']) ?></td>
                                            <td class="p-3 border"><?= htmlspecialchars($class['Location_Name']) ?></td>
                                        </tr>
                                        <?php $rowCount++; ?>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="p-3 text-center text-gray-500">
                                            No classes scheduled
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>