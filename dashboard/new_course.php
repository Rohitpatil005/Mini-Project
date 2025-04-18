<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">

        <nav class="w-64 bg-gray-800 text-white p-5 shadow-lg">
            <h2 class="text-3xl font-bold mb-5">Course Portal</h2>
            <ul class="space-y-4 text-lg">
                <li><a href="student_dashboard.php" class="hover:text-gray-400">🏠 Dashboard</a></li>
                <li><a href="announcement.php" class="hover:text-gray-400">📢 Announcements</a></li>
                <li><a href="schedule.php" class="hover:text-gray-400">📅 Schedule</a></li>
            </ul>
        </nav>

        <div class="flex-1 p-6">
            <header class="flex justify-between items-center bg-gray-800 p-4 rounded shadow-md">
                <h1 class="text-white text-3xl font-semibold">📜 New Courses</h1>
                <a href="index.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">Logout</a>
            </header>

            <section class="mt-6">
                <div class="bg-white p-5 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-3">Upcoming Courses</h2>
                    <ul class="space-y-4">
                        <li>✅ Advanced AI & Machine Learning</li>
                        <li>✅ Blockchain & Cryptography</li>
                        <li>✅ Internet of Things (IoT)</li>
                        <li>✅ Cybersecurity & Ethical Hacking</li>
                        <li>✅ Data Science with Python</li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
