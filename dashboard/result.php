<?php
session_start();
require '../db.php';

if (!isset($_SESSION['loginUser'])) {
    header("Location: ../index.php");
    exit();
}

// Fetch results with course and instructor info
$stmt = $conn->prepare("
    SELECT 
        r.final_grade,
        r.percentage,
        r.remarks,
        s.Name AS student_name,
        ec.Elective_Name AS course_name,
        t.teacher_Name AS instructor_name
    FROM results r
    JOIN student s ON r.student_id = s.Student_ID
    JOIN elective_course ec ON r.course_id = ec.Course_ID
    JOIN teacher t ON r.instructor_id = t.teacher_id
    WHERE r.student_id = ?
");
$stmt->bind_param("i", $_SESSION['loginUser']);
$stmt->execute();
$results = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background: #2d3748;
            color: white;
            margin-bottom: 1rem;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>
<body class="bg-white p-6 text-white">
    <div class="container">
        <h2 class="text-4xl font-bold mb-6 text-gray-800 text-center">📜 Course Results</h2>
        
        <?php if ($results->num_rows > 0): ?>
            <?php while($result = $results->fetch_assoc()): ?>
                <div class="card transform hover:scale-[1.01] transition-transform">
                    <h3 class="text-xl font-semibold mb-2">✅ <?= htmlspecialchars($result['course_name']) ?></h3>
                    <p class="mb-1"><strong>Student Name:</strong> <?= htmlspecialchars($result['student_name']) ?></p>
                    <p class="mb-1"><strong>Instructor:</strong> <?= htmlspecialchars($result['instructor_name']) ?></p>
                    <p class="mb-1"><strong>Final Grade:</strong> 
                        <span class="text-green-400 font-bold"><?= htmlspecialchars($result['final_grade']) ?></span>
                    </p>
                    <p class="mb-1"><strong>Percentage:</strong> <?= htmlspecialchars($result['percentage']) ?>%</p>
                    <p class="mb-0"><strong>Remarks:</strong> <?= htmlspecialchars($result['remarks']) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="card text-center">
                <p class="text-xl">No results available yet.</p>
            </div>
        <?php endif; ?>

        <div class="mt-6 text-center">
            <button class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                Download Results PDF
            </button>
        </div>
    </div>
</body>
</html>