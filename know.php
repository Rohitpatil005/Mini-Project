<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elective Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            
            background-size: cover;
            background-position: center;
            color: white;
            height: 100vh;
            overflow: hidden;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;

        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .info-container {
            max-width: 800px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }
        .search-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-container input {
            height: 40px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            margin-right: 10px;
        }
        .search-container button {
            height: 40px;
            padding: 10px 15px;
            background-color: #FFCC00;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-container button:hover {
            background-color: #FFD700;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo" onclick="window.location.href='index.php'"><img src="MIT-WPU_LOGO.webp" width="200" height="60"></div>
        <div>
            <a href="index.php">Home</a>
            <a href="teacher_login.php">Teacher Login</a>

        </div>
    </div>
    <div class="video-container">
        <video autoplay loop muted>
            <source src="banner_video_desktop.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="main-container">
        <h2>Elective Courses</h2>
        <div class="info-container">
            <p>Elective courses are optional classes that students can choose to take in addition to their required coursework. They provide opportunities to explore new subjects, enhance skills, and gain knowledge in diverse areas beyond a student's major. By selecting elective courses, students can personalize their education, discover new interests, and prepare for a variety of career paths.</p>
        </div>
       
        <div class="info-container" id="courseList">
            <h3>Available Elective Courses</h3>
            <ul>
                <li>CSE: Python, Java</li>
                <li>MECH: AutoCAD, Mech-1, Mech-2, Mech-3</li>
                <li>EEE: IoT, Embedded-C</li>
                <li>ECE: Subject 1, Subject 2, Subject 3</li>
            </ul>
        </div>
    </div>
    <script>
        function searchCourses() {
            const input = document.getElementById("courseSearch").value.toLowerCase();
            const courseList = document.getElementById("courseList");
            const courses = [
                "CSE: Python, Java",
                "MECH: AutoCAD, Mech-1, Mech-2, Mech-3",
                "EEE: IoT, Embedded-C",
                "ECE: Subject 1, Subject 2, Subject 3"
            ];

            const filteredCourses = courses.filter(course => course.toLowerCase().includes(input));
            courseList.innerHTML = `<h3>Available Elective Courses</h3><ul>${filteredCourses.map(course => `<li>${course}</li>`).join('')}</ul>`;
        }
    </script>
</body>
</html>
