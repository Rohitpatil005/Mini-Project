<?php
// Database configuration
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "miniproject";

// Establish connection
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$student_id = $_POST['student_id'] ?? '';
$input_password = $_POST['password'] ?? '';  // Changed from password_hash for clarity

// Prepare SQL statement with parameterized query to prevent SQL injection
$sql = "SELECT student_id, password_hash FROM users WHERE student_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $student_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    
    // Verify password (assuming password_hash contains properly hashed passwords)
    if (password_verify($input_password, $row['password_hash'])) {
        session_start();
        $_SESSION['loginUser'] = $student_id;
        header("Location: dashboard/student_dashboard.php");
        exit();
    }
}

// If we get here, login failed
echo "<script>alert('User ID or Password is incorrect!');</script>";
header("refresh:0;url=index.php");
exit();
?>