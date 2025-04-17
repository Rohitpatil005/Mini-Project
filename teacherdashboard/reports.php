<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-gradient-to-b from-purple-800 to-blue-600 text-white p-5 shadow-lg">
            <h2 class="text-3xl font-bold mb-5">Course Portal</h2>
            <ul class="space-y-4 text-lg">
                <li><a href="index.html" class="hover:text-gray-300">🏠 Dashboard</a></li>
                <li><a href="coursemanagement.html" class="hover:text-gray-300">📚 Course Management</a></li>
                <li><a href="Student_Interaction.html" class="hover:text-gray-300">🎓 Student Interaction</a></li>
                <li><a href="Grade&Assesment.html" class="hover:text-gray-300">📝 Grading & Assessments</a></li>
                <li><a href="support.html" class="hover:text-gray-300">💬 Support</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <header class="flex justify-between items-center bg-white p-4 rounded shadow-md">
                <h1 class="text-3xl font-semibold">📊 Reports</h1>
                <a href="index.html" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">Logout</a>
            </header>
            
            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">📑 Course Reports</h2>
                <div class="bg-white p-5 rounded-lg shadow-lg">
                    <p>📌 Student Progress Overview</p>
                    <p>📌 Attendance Reports</p>
                    <p>📌 Grade Distribution</p>
                    <p>📌 Performance Analytics</p>
                </div>
            </section>

            <section class="mt-6">
                <h2 class="text-xl font-semibold mb-3">🔎 Detailed Reports</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="#" class="bg-blue-500 text-white p-4 rounded-lg shadow-lg text-center">📥 Download Attendance Report</a>
                    <a href="#" class="bg-green-500 text-white p-4 rounded-lg shadow-lg text-center">📥 Download Grade Report</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
