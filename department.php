
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
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
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-y: auto; 
            height: calc(100vh - 60px); 
            position: relative;
            z-index: 2;
        }

        .department-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            width: 80%;
            max-width: 800px;
        }

        .department-card {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
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
        <div class="logo" onclick="window.location.href='index.php'">MIT-WPU</div>
        <div>
            <a href="index.php">Home</a>
            <a href="department.php">Department</a>
            <a href="courses.php">Courses</a>
            <a href="about.php">Admin Login</a>
            <a href="teacher_login.php">Teacher Login</a>
        </div>
    </div>

    <div class="main-container">
        <h2>Departments</h2>
        <div class="department-grid">
            <div class="department-card">
                <h3>CSE</h3>
                <p>Computer Science and Engineering focuses on computing, programming, and the development of software systems.</p>
            </div>
            <div class="department-card">
                <h3>EEE</h3>
                <p>Electrical and Electronics Engineering covers the study of electrical systems and their applications.</p>
            </div>
            <div class="department-card">
                <h3>ECE</h3>
                <p>Electronics and Communication Engineering emphasizes electronic devices and communication systems.</p>
            </div>
            <div class="department-card">
                <h3>MECH</h3>
                <p>Mechanical Engineering involves the design and manufacture of mechanical systems.</p>
            </div>
        </div>
    </div>
</body>
</html>