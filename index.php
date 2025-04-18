<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
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
            position: relative;
            z-index: 2;
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
            justify-content: space-between;
            align-items: center;
            height: 100vh;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .info-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-right: 20px;
            max-width: 700px;
        }

        .info-container p {
            font-size: 20px;
            line-height: 1.5;
            text-align: center;
        }

        .info-container button {
            background-color: #0d3ace;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, border-radius 0.3s ease;
            align-self: center;
            margin-top: 10px;
        }

        .info-container button:hover {
            background-color: #4b24d7;
            border-radius: 15px;
        }

        .login-container {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            max-width: 400px;
            width: 100%;
        }

        #loginForm {
            width: 100%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            background-color: rgba(0, 0, 0, 0.7);
        }

        #loginForm > input, #loginForm > label {
            margin-bottom: 15px;
            width: 100%;
        }

        #loginForm > input[type="text"], #loginForm > input[type="password"] {
            height: 30px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        #loginForm > input[type="submit"] {
            background-color: #2750d6;
            color: black;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            height: 40px;
            width: 100%;
        }

        #loginForm > input[type="submit"]:hover {
            background-color: #1900ff;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #2750d6;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
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
        <div class="logo" onclick="window.location.href='index.php'"><img src="MIT-WPU_LOGO.webp" width="200" height="60"></div>
        <div>
            <a href="index.php">Home</a>
            <a href="teacherindex.php">Teacher Login</a>
        </div>
    </div>

    <div class="main-container">
        <div class="info-container">
            <p>Empower your learning journey by exploring diverse elective courses tailored for your passions. Discover new opportunities and shape your future today!</p>
            <button onclick="window.location.href='know.php'">Know More</button>
        </div>
        <div class="login-container">
            <form id="loginForm" action="student_login.php" method="post">
                <h2>Log In</h2>
                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id" required>                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

</body>
</html>
