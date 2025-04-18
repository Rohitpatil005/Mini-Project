<?php
session_start(); // Add session start
require '../db.php';

// Check if user is logged in
if (!isset($_SESSION['loginUser'])) {
    header("Location: ../teacherindex.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $expiry_date = $_POST['expiry_date'];
    $teacher_id = $_SESSION['loginUser'];

    // Modified query to match your database structure
    $stmt = $conn->prepare("INSERT INTO announcements (title, description, posted_by, expiry_date, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $title, $description, $teacher_id, $expiry_date);
    $stmt->execute();
    header("Location: teacher_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Announcement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Simplified sidebar -->
        <nav class="w-64 bg-gradient-to-b from-purple-800 to-blue-600 text-white p-5 shadow-lg">
            <h2 class="text-3xl font-bold mb-5">Course Portal</h2>
            <ul class="space-y-4 text-lg">
                <li><a href="teacher_dashboard.php" class="hover:text-gray-300">🏠 Dashboard</a></li>
                <li><a href="coursemanagement.php" class="hover:text-gray-300">📚 Course Management</a></li>
                <li><a href="announcement.php" class="hover:text-gray-300">📢 Announcements</a></li>
                <li><a href="../logout.php" class="hover:text-gray-300">🚪 Logout</a></li>
            </ul>
        </nav>

        <div class="flex-1 p-6 overflow-y-auto">
            <header class="flex justify-between items-center bg-white p-4 rounded shadow-md mb-6">
                <h1 class="text-3xl font-semibold">Create New Announcement</h1>
                <a href="../logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">Logout</a>
            </header>

            <section class="bg-white p-6 rounded-lg shadow-lg">
                <form method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" name="title" required
                               class="w-full p-2 border rounded">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                        <textarea name="description" rows="4" required
                                  class="w-full p-2 border rounded"></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Expiry Date</label>
                        <input type="date" name="expiry_date" required
                               class="p-2 border rounded">
                    </div>
                    
                    <button type="submit" 
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Post Announcement
                    </button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>