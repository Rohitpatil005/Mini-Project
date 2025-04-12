<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Check if fields are empty
    if (empty($student_id) || empty($password)) {
        $_SESSION['error'] = "Please fill in all fields";
        header("Location: index.php"); // Redirect back to login page
        exit();
    } else {
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE student_id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        
        // Bind parameters and execute
        $stmt->bind_param("s", $student_id);
        $stmt->execute();
        
        // Get result
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['student_id'] = $user['student_id'];
            $_SESSION['logged_in'] = true;
            
            header("Location: student_dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid Student ID or Password";
            header("Location: index.php");
            exit();
        }
        
        $stmt->close();
    }
}
?>