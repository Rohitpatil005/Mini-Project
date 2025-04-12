<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: white;
            height: 100vh;
            overflow: hidden;
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

        .logo {
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .main-container {
            display: flex;
            height: calc(100vh - 60px);
            position: relative;
            z-index: 2;
        }

        .sidebar {
            width: 200px;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(255, 204, 0, 0.5);
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        h2 {
            margin-bottom: 20px;
        }

        .courses-list {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    
    <div class="video-container">
        <video autoplay loop muted>
            <source src="banner_video_desktop.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="navbar">
        <div class="logo" onclick="window.location.href='index.html'">MIT-WPU</div>
        <div>
            <a href="index.html">Home</a>
            <a href="department.html">Department</a>
            <a href="courses.html">Courses</a>
            <a href="about.html">Admin Login</a>
            <a href="teacher_login.html">Teacher Login</a>
        </div>
    </div>

    <div class="main-container">
        <div class="sidebar">
            <h3>Departments</h3>
            <a href="#" onclick="showCourses('CSE')">CSE</a>
            <a href="#" onclick="showCourses('EEE')">EEE</a>
            <a href="#" onclick="showCourses('ECE')">ECE</a>
            <a href="#" onclick="showCourses('MECH')">MECH</a>
        </div>
        <div class="content">
            <h2>Courses</h2>
            <div id="coursesContainer" class="courses-list"></div>
        </div>
    </div>

</body>
</html>
