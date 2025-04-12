<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Course Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background: #2d3748;
            color: white;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>
<body class="bg-white p-6 text-white">
    <div class="container">
        <h2 class="text-4xl font-bold mb-6 text-gray-800 text-center">📜 Course Result</h2>
        
        <div class="card">
            <h3 class="text-xl font-semibold mb-2">✅ Astro Physics</h3>
            <p><strong>Student Name:</strong> Virat Kohli</p>
            <p><strong>Instructor:</strong> Deobrat Singh</p>
            <p><strong>Final Grade:</strong> <span class="text-green-400 font-bold">A</span></p>
            <p><strong>Percentage:</strong> 92%</p>
            <p><strong>Remarks:</strong> Excellent performance! Keep up the good work.</p>
        </div>
        
        <div class="mt-6 text-center">
            <button class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">Download Result PDF</button>
        </div>
    </div>
</body>
</html>
