<?php
session_start();
if (!isset($_SESSION['loginUser'])) {
    header("Location: ../index.php");
    exit();
}
require '../db.php';

// Fetch enrolled courses
$stmt = $conn->prepare("
    SELECT 
        ec.Elective_Name,
        t.teacher_Name,
        e.Entollment_Date,
        ec.Credits
    FROM enrollment e
    JOIN elective_course ec ON e.Course_ID = ec.Course_ID
    LEFT JOIN course_professor cp ON ec.Course_ID = cp.Course_ID
    LEFT JOIN teacher t ON cp.Professor_ID = t.teacher_id
    WHERE e.Student_ID = ?
    ORDER BY e.Entollment_Date DESC
");
$stmt->bind_param("i", $_SESSION['loginUser']);
$stmt->execute();
$enrolledCourses = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Keep existing head content -->
    <style>
        /* Add this to fix white screen CSS issues */
        body {
            background-color: #f7fafc;
        }
        .card {
            background: #2d3748;
            color: white;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="p-6">
    <div class="container mx-auto max-w-6xl">
        <h2 class="text-4xl font-bold mb-8 text-center text-gray-800">📚 My Courses</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php if ($enrolledCourses->num_rows > 0): ?>
                <?php while($course = $enrolledCourses->fetch_assoc()): ?>
                    <div class="card transform hover:scale-105 transition duration-300">
                        <h3 class="text-xl font-semibold mb-2">🎓 <?= htmlspecialchars($course['Elective_Name']) ?></h3>
                        <p class="text-gray-300">Instructor: <?= htmlspecialchars($course['teacher_Name'] ?? 'To be announced') ?></p>
                        <p class="text-gray-300 mt-2">Enrolled: <?= date('M j, Y', strtotime($course['Entollment_Date'])) ?></p>
                        <p class="text-gray-300">Credits: <?= $course['Credits'] ?></p>
                        <button class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                            View Course Materials
                        </button>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="card text-center col-span-full">
                    <p class="text-xl mb-4">No courses enrolled yet</p>
                    <a href="courses.php" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                        Browse Available Courses
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Keep existing chart and discussion forum code -->
</body>
</html>