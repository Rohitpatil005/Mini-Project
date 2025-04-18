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
                <li><a href="index.php" class="hover:text-gray-400">🏠 Dashboard</a></li>
                <li><a href="announcement.php" class="hover:text-gray-400">📢 Announcements</a></li>
                <li><a href="new_course.php" class="hover:text-gray-400">📜 New Courses</a></li>
            </ul>
        </nav>

        <div class="flex-1 p-6">
            <header class="flex justify-between items-center bg-gray-800 p-4 rounded shadow-md">
                <h1 class="text-white text-3xl font-semibold">📅 Schedule</h1>
                <a href="index.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">Logout</a>
            </header>

            <section class="mt-6">
                <div class="bg-white p-5 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-3">Your Class Timetable</h2>
                    <table class="w-full border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-800 text-white">
                                <th class="border p-2">Day</th>
                                <th class="border p-2">Time</th>
                                <th class="border p-2">Course</th>
                                <th class="border p-2">Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border p-2">Monday</td>
                                <td class="border p-2">10:00 AM - 12:00 PM</td>
                                <td class="border p-2">Advanced AI</td>
                                <td class="border p-2">Room 101</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="border p-2">Wednesday</td>
                                <td class="border p-2">02:00 PM - 04:00 PM</td>
                                <td class="border p-2">Blockchain Tech</td>
                                <td class="border p-2">Room 202</td>
                            </tr>
                            <tr>
                                <td class="border p-2">Friday</td>
                                <td class="border p-2">11:00 AM - 01:00 PM</td>
                                <td class="border p-2">Cybersecurity</td>
                                <td class="border p-2">Room 303</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
