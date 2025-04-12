<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Simple validation
    if (empty($student_id)) {
        $_SESSION['error'] = "Please enter Student ID";
        header("Location: index.php");
        exit();
    }
    if (empty($password)) {
        $_SESSION['error'] = "Please enter Password";
        header("Location: index.php");
        exit();
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT users.*, student.* 
                          FROM users 
                          INNER JOIN student ON users.student_id = student.Student_ID
                          WHERE student_id = ?");
    if (!$stmt) {
        $_SESSION['error'] = "Database error";
        header("Location: index.php");
        exit();
    }
    
    $stmt->bind_param("s", $student_id);
    if (!$stmt->execute()) {
        $_SESSION['error'] = "Login failed";
        header("Location: index.php");
        exit();
    }
    
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password (assuming passwords are hashed)
        if (password_verify($password, $user['password_hash'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['student_id'] = $user['student_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;
            
            // Redirect to dashboard
            header("Location: dashboard/student_dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid password";
        }
    } else {
        $_SESSION['error'] = "User not found";
    }
    
    $stmt->close();
    header("Location: index.php");
    exit();
}

// If not a POST request, redirect to index
header("Location: index.php");
exit();
?>