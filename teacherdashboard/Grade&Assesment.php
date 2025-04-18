<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading and Assessment</title>
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
            width: 100%;
            height: 300px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-600 to-blue-500 min-h-screen p-6 text-white">
    <div class="container">
        <h2 class="text-4xl font-bold mb-6 text-center">📑 Grading and Assessment</h2>
        
        <div class="grid md:grid-cols-2 gap-6">
          
            <div class="card">
                <h3 class="text-xl font-semibold mb-4 text-purple-700">📊 Student Grades</h3>
                <ul id="gradesList" class="space-y-2">
                    <li class="p-3 bg-green-200 text-green-800 rounded">Shreyas Sarode - A</li>
                    <li class="p-3 bg-yellow-200 text-yellow-800 rounded">Disha Verma - B+</li>
                    <li class="p-3 bg-red-200 text-red-800 rounded">Mohit Haibatpure - C</li>
                </ul>
            </div>
            
           
            <div class="card flex flex-col items-center">
                <h3 class="text-xl font-semibold mb-4 text-purple-700">📈 Class Performance</h3>
                <div class="chart-container">
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>
        </div>
        
       
        <div class="mt-8 card">
            <h3 class="text-xl font-semibold mb-4 text-purple-700">✍️ Manage Grades</h3>
            <input type="text" id="studentName" placeholder="Student Name" class="w-full p-3 rounded border-gray-300 shadow text-black mb-2">
            <input type="text" id="studentGrade" placeholder="Grade (A, B, C...)" class="w-full p-3 rounded border-gray-300 shadow text-black mb-2">
            <button onclick="addGrade()" class="mt-3 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded shadow w-full">Add/Update Grade</button>
        </div>
    </div>
    
    <script>
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['A', 'B+', 'B', 'C', 'D', 'F'],
                datasets: [{
                    label: 'Number of Students',
                    data: [10, 8, 5, 3, 2, 1],
                    backgroundColor: ['#6B46C1', '#3182CE', '#38A169', '#ECC94B', '#ED8936', '#E53E3E'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        function addGrade() {
            const name = document.getElementById('studentName').value;
            const grade = document.getElementById('studentGrade').value;
            if (name && grade) {
                const gradesList = document.getElementById('gradesList');
                const newEntry = document.createElement('li');
                newEntry.textContent = `${name} - ${grade}`;
                newEntry.classList.add('p-3', 'bg-blue-200', 'text-blue-800', 'rounded');
                gradesList.appendChild(newEntry);
            }
        }
    </script>
</body>
</html>
