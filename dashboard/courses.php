<?php
session_start();
if (!isset($_SESSION['loginUser'])) {
    header("Location: ../index.php");
    exit();
}
require '../db.php';

// Fetch all available courses with instructor info
$courses = $conn->query("
    SELECT 
        ec.Course_ID,
        ec.Elective_Name,
        ec.Credits,
        t.teacher_Name,
        t.Email,
        m.Mode_Type
    FROM elective_course ec
    LEFT JOIN course_professor cp ON ec.Course_ID = cp.Course_ID
    LEFT JOIN teacher t ON cp.Professor_ID = t.teacher_id
    LEFT JOIN course_mode cm ON ec.Course_ID = cm.Course_ID
    LEFT JOIN mode m ON cm.Mode_ID = m.Mode_ID
    ORDER BY ec.Elective_Name
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function filterCourses() {
            const input = document.getElementById("search").value.toLowerCase();
            const courseCards = document.getElementsByClassName("course-card");
            
            for (let card of courseCards) {
                const title = card.querySelector('h3').innerText.toLowerCase();
                card.style.display = title.includes(input) ? "block" : "none";
            }
        }

        function showEnrollModal(courseId, courseName) {
            document.getElementById('enrollCourseId').value = courseId;
            document.getElementById('enrollCourseName').textContent = courseName;
            document.getElementById('enrollModal').classList.remove('hidden');
        }

        function enrollCourse() {
            const courseId = document.getElementById('enrollCourseId').value;
            
            fetch('enroll.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `course_id=${encodeURIComponent(courseId)}`
            })
            .then(response => {
                if (!response.ok) throw new Error('Network error');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.href = 'my_courses.php';
                } else {
                    alert(data.message || 'Enrollment failed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to enroll - please try again');
            })
            .finally(() => {
                document.getElementById('enrollModal').classList.add('hidden');
            });
        }
    </script>
</head>
<body class="bg-gray-100 p-6">
    <!-- Enrollment Modal -->
    <div id="enrollModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-96">
            <h3 class="text-xl font-bold mb-4">Confirm Enrollment</h3>
            <p>You are enrolling in: <span id="enrollCourseName" class="font-semibold"></span></p>
            <input type="hidden" id="enrollCourseId">
            <div class="mt-6 flex justify-end gap-3">
                <button onclick="document.getElementById('enrollModal').classList.add('hidden')" 
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Cancel
                </button>
                <button onclick="enrollCourse()" 
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <h2 class="text-4xl font-extrabold mb-6 text-gray-800 text-center uppercase tracking-wide">Explore Our Courses</h2>
    
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-3">🔎 Search Courses</h3>
        <input id="search" type="text" placeholder="Search courses..." onkeyup="filterCourses()" 
               class="w-full p-3 rounded border-gray-300 shadow">
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php while($course = $courses->fetch_assoc()): ?>
        <div class="course-card bg-gray-800 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-transform duration-200">
            <h3 class="text-lg font-semibold mb-2">📚 <?= htmlspecialchars($course['Elective_Name']) ?></h3>
            <div class="space-y-2 text-gray-300">
                <p>Instructor: <?= htmlspecialchars($course['teacher_Name'] ?? 'TBA') ?></p>
                <p>Email: <?= htmlspecialchars($course['Email'] ?? 'N/A') ?></p>
                <p>Mode: <?= htmlspecialchars($course['Mode_Type']) ?></p>
                <p>Credits: <?= $course['Credits'] ?></p>
            </div>
            <button onclick="showEnrollModal('<?= $course['Course_ID'] ?>', '<?= $course['Elective_Name'] ?>')"
                    class="mt-4 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full transition-colors">
                Enroll Now
            </button>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>