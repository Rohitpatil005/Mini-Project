<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$conn = mysqli_connect("localhost", "root", "", "miniproject");

if (!$conn) die("Connection failed: " . mysqli_connect_error());

$student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
$input_password = $_POST['password'];

// Debug output (remove in production)
echo "Trying to login with:<br>";
echo "Student ID: $student_id<br>";
echo "Password: $input_password<br>";

$stmt = mysqli_prepare($conn, "SELECT student_id, password_hash FROM users WHERE student_id = ?");
mysqli_stmt_bind_param($stmt, "s", $student_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    
    // Debug output
    echo "<br>Database record found:<br>";
    print_r($row);
    
    // First try direct comparison (if passwords aren't hashed)
    if ($input_password === $row['password_hash']) {
        $_SESSION['loginUser'] = $student_id;
        header("Location: dashboard\student_dashboard.php");
        exit();
    }
    // Then try password_verify (if passwords are hashed)
    elseif (password_verify($input_password, $row['password_hash'])) {
        $_SESSION['loginUser'] = $student_id;
        header("Location: dashboard\student_dashboard.php");
        exit();
    }
    else {
        echo "<br>Password comparison failed!";
    }
}

echo "<script>alert('Invalid credentials'); window.location.href='index.php';</script>";
?>