<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background: white;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        .chart-container {
            width: 300px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body class="bg-gray-50 p-6">
    <div class="container">
        <h2 class="text-4xl font-bold mb-6 text-purple-800 text-center">📚 Course Management</h2>
        
        <div class="flex flex-col md:flex-row gap-6 items-center justify-center">
            
            <div class="card w-full md:w-1/2 border-l-4 border-purple-600">
                <h3 class="text-xl font-semibold mb-2 text-blue-700">✅ Astro Physics</h3>
                <p>Instructor: <span class="font-bold">Deobrat Singh</span></p>
                <p>Total Students: <span class="font-bold">25</span></p>
                <p>Next Assignment: <span class="font-bold text-purple-700">Project on Responsive Design</span> (Due: March 30)</p>
                <p>Exam Date: <span class="font-bold text-blue-700">April 15</span></p>
                <button class="mt-4 bg-purple-600 text-white px-4 py-2 rounded shadow w-full">Manage Course</button>
            </div>
            
           
            <div class="card w-full md:w-1/2 text-center border-l-4 border-blue-600">
                <h3 class="text-xl font-semibold mb-4 text-blue-700">📊 Student Progress</h3>
                <div class="chart-container">
                    <canvas id="progressChart"></canvas>
                </div>
            </div>
        </div>

       
        <div class="mt-8 flex flex-col md:flex-row gap-6">
            <div class="card w-full md:w-1/3 border-l-4 border-purple-600">
                <h3 class="text-lg font-semibold text-blue-700">📄 Assignments</h3>
                <p>View and manage upcoming assignments.</p>
                <button class="mt-3 bg-purple-600 text-white px-4 py-2 rounded shadow w-full">View Assignments</button>
            </div>
            <div class="card w-full md:w-1/3 border-l-4 border-blue-600">
                <h3 class="text-lg font-semibold text-purple-700">📢 Announcements</h3>
                <p>Post important updates for students.</p>
                <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded shadow w-full">Create Announcement</button>
            </div>
            <div class="card w-full md:w-1/3 border-l-4 border-purple-600">
                <h3 class="text-lg font-semibold text-blue-700">📜 Attendance</h3>
                <p>Track student attendance records.</p>
                <button class="mt-3 bg-purple-600 text-white px-4 py-2 rounded shadow w-full">View Attendance</button>
            </div>
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
                    backgroundColor: ['#6D28D9', '#3B82F6'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
</body>
</html>