<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <nav class="w-64 bg-gradient-to-b from-purple-800 to-blue-600 text-white p-5 shadow-lg">
            <h2 class="text-3xl font-bold mb-5">Course Portal</h2>
            <ul class="space-y-4 text-lg">
                <li><a href="index.php" class="hover:text-gray-300">🏠 Dashboard</a></li>
                <li><a href="new_course.php" class="hover:text-gray-300">📜 New Courses</a></li>
                <li><a href="schedule.php" class="hover:text-gray-300">📅 Schedule</a></li>
            </ul>
        </nav>

        <div class="flex-1 p-6">
            <header class="flex justify-between items-center bg-white p-4 rounded shadow-md">
                <h1 class="text-3xl font-semibold">📢 Announcements</h1>
                <a href="index.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">Logout</a>
            </header>

            <section class="mt-6">
                <div class="bg-white p-5 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-3">Latest Announcements</h2>
                    <ul class="space-y-4">
                        <li>📌 Mid-Sem Exams start from April 10.</li>
                        <li>📌 New elective courses available for registration.</li>
                        <li>📌 University fest scheduled for May 15-18.</li>
                        <li>📌 Last date for course registration: March 30.</li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
