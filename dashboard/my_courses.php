<?php
session_start();
if (!isset($_SESSION['loginUser'])) {
    header("Location: ../index.php");
    exit();
}
require '../db.php';

// Handle question submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question'])) {
    $course_id = $_POST['course_id'];
    $question = $_POST['question'];
    $student_id = $_SESSION['loginUser'];

    // First verify the course exists
    $checkCourse = $conn->prepare("SELECT Course_ID FROM elective_course WHERE Course_ID = ?");
    $checkCourse->bind_param("i", $course_id);
    $checkCourse->execute();
    $checkCourse->store_result();
    
    if ($checkCourse->num_rows > 0) {
        // Course exists, proceed with question insertion
        $stmt = $conn->prepare("INSERT INTO questions (course_id, student_id, question) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $course_id, $student_id, $question);
        if (!$stmt->execute()) {
            // Log error but don't show to user
            error_log("Failed to insert question: " . $stmt->error);
        }
    } else {
        // Course doesn't exist - log error
        error_log("Attempt to add question to non-existent course ID: $course_id");
    }
}

// Fetch enrolled courses with course IDs
$stmt = $conn->prepare("
    SELECT 
        ec.Course_ID,
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
$stmt->bind_param("s", $_SESSION['loginUser']);
$stmt->execute();
$enrolledCourses = $stmt->get_result();

// Fetch questions for each course
$questions = [];
if ($enrolledCourses->num_rows > 0) {
    while ($course = $enrolledCourses->fetch_assoc()) {
        $stmt = $conn->prepare("
            SELECT q.*, s.Name AS student_name 
            FROM questions q
            JOIN student s ON q.student_id = s.Student_ID
            WHERE q.course_id = ?
            ORDER BY q.created_at DESC
        ");
        $stmt->bind_param("i", $course['Course_ID']);
        $stmt->execute();
        $questions[$course['Course_ID']] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    $enrolledCourses->data_seek(0); // Reset pointer for display loop
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #f7fafc; }
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
                    <div class="space-y-4">
                        <div class="card transform hover:scale-105 transition duration-300">
                            <h3 class="text-xl font-semibold mb-2">🎓 <?= htmlspecialchars($course['Elective_Name']) ?></h3>
                            <p class="text-gray-300">Instructor: <?= htmlspecialchars($course['teacher_Name'] ?? 'To be announced') ?></p>
                            <p class="text-gray-300 mt-2">Enrolled: <?= date('M j, Y', strtotime($course['Entollment_Date'])) ?></p>
                            <p class="text-gray-300">Credits: <?= $course['Credits'] ?></p>
                            <button class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                                View Course Materials
                            </button>
                        </div>

                        <!-- Discussion Forum Section -->
                        <div class="mt-4 bg-gray-800 p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold mb-4">💬 Discussion Forum</h3>
                            
                            <!-- Existing Questions -->
                            <?php if (!empty($questions[$course['Course_ID']])): ?>
                                <?php foreach ($questions[$course['Course_ID']] as $q): ?>
                                    <div class="mb-4 p-3 bg-gray-700 rounded">
                                        <p class="text-sm text-gray-300">
                                            <?= htmlspecialchars($q['student_name']) ?> asked on 
                                            <?= date('M j, Y g:i a', strtotime($q['created_at'])) ?>
                                        </p>
                                        <p class="text-white mt-1"><?= htmlspecialchars($q['question']) ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-gray-400">No questions yet. Be the first to ask!</p>
                            <?php endif; ?>

                            <!-- Question Form -->
                            <form method="POST" class="mt-4">
                                <input type="hidden" name="course_id" value="<?= $course['Course_ID'] ?>">
                                <textarea name="question" placeholder="Ask a question..." 
                                        class="w-full p-3 rounded border-gray-600 shadow bg-gray-700 text-white"
                                        required></textarea>
                                <button type="submit" 
                                        class="mt-3 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow w-full">
                                    Post Question
                                </button>
                            </form>
                        </div>
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
</body>
</html>