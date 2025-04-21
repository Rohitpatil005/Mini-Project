<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
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
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
            position: relative;
            z-index: 2;
        }

        #loginForm {
            width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
        }

        #loginForm > input, #loginForm > label {
            margin-bottom: 15px;
            width: 100%;
        }

        #loginForm > input[type="text"], #loginForm > input[type="password"] {
            height: 35px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        #loginForm > input[type="submit"] {
            background-color: #371ec4;
            color: black;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            height: 40px;
            width: 100%;
        }

        #loginForm > input[type="submit"]:hover {
            background-color: #1b1bd8;
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
        <div class="logo" onclick="window.location.href='index.php'">,<img src="MIT-WPU_LOGO.webp" alt="width="200" height="60""></div>
        <div>
            <a href="index.php">Home</a>
            <a href="index.php">Student Login</a>
        </div>
    </div>

    <div class="main-container">
    <form id="loginForm" action="teacher_login.php" method="post">
    <h2>Teacher Log In</h2>
    <label for="teacherId">Teacher ID:</label>
    <input type="text" id="teacherId" name="teacher_id" required> 
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Submit">
    <div class="forgot-password">
        <a href="forgot_password.php">Forgot Password?</a>
    </div>
</form>
    </div>

</body>
</html>
