<?php
session_start();
require '../db.php';

if (!isset($_SESSION['loginUser'])) {
    header("Location: ../teacherindex.php");
    exit();
}

// Fetch teacher's courses
$courses_stmt = $conn->prepare("SELECT course_id FROM elective_course WHERE assigned_teacher = ?");
$courses_stmt->bind_param("s", $_SESSION['loginUser']);
$courses_stmt->execute();
$teacher_courses = $courses_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Fetch questions for teacher's courses
$course_ids = array_column($teacher_courses, 'course_id');
$placeholders = implode(',', array_fill(0, count($course_ids), '?'));
$question_stmt = $conn->prepare("
    SELECT q.*, ec.elective_name 
    FROM questions q
    JOIN elective_course ec ON q.course_id = ec.Course_ID
    WHERE q.course_id IN ($placeholders)
");
$question_stmt->bind_param(str_repeat('i', count($course_ids)), ...$course_ids);
$question_stmt->execute();
$questions = $question_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Handle replies
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply'])) {
    $reply = $_POST['reply'];
    $question_id = $_POST['question_id'];
    
    $stmt = $conn->prepare("INSERT INTO replies (question_id, teacher_id, reply) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $question_id, $_SESSION['loginUser'], $reply);
    $stmt->execute();
}
?>

<!-- In the Student Queries section -->
<div class="mt-8 card">
    <h3 class="text-xl font-semibold mb-4 text-purple-700">💬 Student Queries</h3>
    
    <?php foreach ($questions as $q): ?>
    <div class="mb-4 p-4 bg-gray-100 rounded">
        <p class="font-semibold"><?= $q['elective_name'] ?></p>
        <p class="text-gray-800"><?= htmlspecialchars($q['question']) ?></p>
        <small class="text-gray-600">Asked by <?= $q['student_id'] ?> on <?= date('M j, Y', strtotime($q['created_at'])) ?></small>
        
        <!-- Replies -->
        <?php 
        $reply_stmt = $conn->prepare("SELECT * FROM replies WHERE question_id = ?");
        $reply_stmt->bind_param("i", $q['question_id']);
        $reply_stmt->execute();
        $replies = $reply_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        ?>
        
        <?php foreach ($replies as $r): ?>
        <div class="ml-4 mt-2 p-2 bg-blue-100 rounded">
            <p class="text-gray-800"><?= htmlspecialchars($r['reply']) ?></p>
            <small class="text-gray-600">Replied by Teacher on <?= date('M j, Y', strtotime($r['created_at'])) ?></small>
        </div>
        <?php endforeach; ?>

        <!-- Reply Form -->
        <form method="POST" class="mt-2">
            <input type="hidden" name="question_id" value="<?= $q['question_id'] ?>">
            <textarea name="reply" placeholder="Write your reply..." 
                      class="w-full p-2 rounded border-gray-300 shadow text-black"
                      required></textarea>
            <button type="submit" 
                    class="mt-2 bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                Post Reply
            </button>
        </form>
    </div>
    <?php endforeach; ?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Interaction</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background: white;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        .chart-container {
            width: 250px;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-600 to-blue-500 min-h-screen p-6 text-white">
    <div class="container">
        <h2 class="text-4xl font-bold mb-6 text-center">📖 Student Interaction</h2>
        
        <div class="grid md:grid-cols-2 gap-6">
          
            <div class="card">
                <h3 class="text-xl font-semibold mb-4 text-purple-700">📋 Students Enrolled</h3>
                <input type="text" id="searchStudent" placeholder="Search students..." class="w-full p-2 mb-3 rounded border-gray-300 shadow text-black">
                <ul id="studentList" class="space-y-2">
                    <li class="p-3 bg-green-200 text-green-800 rounded flex items-center">
                        ✅ <span class="ml-2">Rohit Patil (Web Development)</span>
                    </li>
                    <li class="p-3 bg-green-200 text-green-800 rounded flex items-center">
                        ✅ <span class="ml-2">Mohit Haibatpure (Web Development)</span>
                    </li>
                    <li class="p-3 bg-green-200 text-green-800 rounded flex items-center">
                        ✅ <span class="ml-2">Shreyas Sarode (Data Science)</span>
                    </li>
                    <li class="p-3 bg-green-200 text-green-800 rounded flex items-center">
                        ✅ <span class="ml-2">Disha Verma (Data Science)</span>
                    </li>
                    <li class="p-3 bg-red-200 text-red-800 rounded flex items-center">
                        ❌ <span class="ml-2">Sumit Mehta (Not Submitted Project)</span>
                    </li>
                </ul>
            </div>
            
           
            <div class="card flex flex-col items-center">
                <h3 class="text-xl font-semibold mb-4 text-purple-700">📊 Student Progress</h3>
                <div class="chart-container">
                    <canvas id="progressChart"></canvas>
                </div>
            </div>
        </div>
        
        
        <div class="mt-8 card">
            <h3 class="text-xl font-semibold mb-4 text-purple-700">📢 Announcements</h3>
            <textarea placeholder="Post an announcement..." class="w-full p-3 rounded border-gray-300 shadow text-black"></textarea>
            <button class="mt-3 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded shadow w-full">Send Announcement</button>
        </div>

       
        <div class="mt-8 card">
            <h3 class="text-xl font-semibold mb-4 text-purple-700">💬 Student Queries</h3>
            <p class="text-gray-800">ABC: "When is the next project deadline?"</p>
            <p class="text-gray-800">PYQ: "Can I get extra materials for Python?"</p>
            <textarea placeholder="Reply to students..." class="w-full p-3 rounded border-gray-300 shadow text-black"></textarea>
            <button class="mt-3 bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded shadow w-full">Reply</button>
        </div>
    </div>
    
    <script>
        const ctx = document.getElementById('progressChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Pending'],
                datasets: [{
                    data: [18, 7],
                    backgroundColor: ['#6B46C1', '#3182CE'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#333'
                        }
                    }
                }
            }
        });
        
        document.getElementById("searchStudent").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let students = document.querySelectorAll("#studentList li");
            students.forEach(student => {
                let text = student.textContent.toLowerCase();
                student.style.display = text.includes(filter) ? "flex" : "none";
            });
        });
    </script>
</body>
</html>