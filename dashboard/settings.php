<?php
session_start();
require '../db.php';

if (!isset($_SESSION['loginUser'])) {
    header("Location: ../index.php");
    exit();
}

// Fetch user data
$user_id = $_SESSION['loginUser'];
$stmt = $conn->prepare("
    SELECT u.name, u.email, us.profile_picture, us.email_notifications, us.push_notifications 
    FROM users u
    LEFT JOIN user_settings us ON u.user_id = us.user_id
    WHERE u.user_id = ?
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Initialize variables
$name = $user['name'] ?? '';
$email = $user['email'] ?? '';
$profile_pic = $user['profile_picture'] ?? 'default-avatar.jpg';
$email_notifications = $user['email_notifications'] ?? 1;
$push_notifications = $user['push_notifications'] ?? 1;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update profile info
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    
    // Handle file upload
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "../uploads/profiles/";
        $target_file = $target_dir . basename($_FILES['profile_picture']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Validate image
        if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);
            $profile_pic = basename($_FILES['profile_picture']['name']);
        }
    }
    
    // Update notifications
    $email_notifications = isset($_POST['email_notifications']) ? 1 : 0;
    $push_notifications = isset($_POST['push_notifications']) ? 1 : 0;
    
    // Update database
    $update_stmt = $conn->prepare("
        UPDATE users u
        LEFT JOIN user_settings us ON u.user_id = us.user_id
        SET 
            u.name = ?,
            u.email = ?,
            us.profile_picture = ?,
            us.email_notifications = ?,
            us.push_notifications = ?
        WHERE u.user_id = ?
    ");
    $update_stmt->bind_param("sssssi", 
        $new_name,
        $new_email,
        $profile_pic,
        $email_notifications,
        $push_notifications,
        $user_id
    );
    
    if ($update_stmt->execute()) {
        $success = "Settings updated successfully!";
    } else {
        $error = "Error updating settings: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">⚙️ Settings</h2>
        
        <?php if(isset($success)): ?>
            <div class="bg-green-100 p-3 mb-4 rounded"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        
        <?php if(isset($error)): ?>
            <div class="bg-red-100 p-3 mb-4 rounded"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg space-y-6">
            <!-- Profile Settings -->
            <div>
                <h3 class="text-xl font-semibold mb-4">👤 Profile Settings</h3>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Current Profile Picture:</label>
                    <img src="../uploads/profiles/<?= htmlspecialchars($profile_pic) ?>" 
                         class="w-24 h-24 rounded-full mb-4 object-cover border-2 border-blue-200">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Name:</label>
                    <input type="text" name="name" 
                           value="<?= htmlspecialchars($name) ?>"
                           class="w-full p-3 rounded border border-gray-300 focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email:</label>
                    <input type="email" name="email" 
                           value="<?= htmlspecialchars($email) ?>"
                           class="w-full p-3 rounded border border-gray-300 focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Update Profile Picture:</label>
                    <input type="file" name="profile_picture"
                           class="w-full p-2 rounded border border-gray-300 file:mr-4 file:py-2 file:px-4
                           file:rounded file:border-0 file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
            </div>

            <!-- Security -->
            <div>
                <h3 class="text-xl font-semibold mb-4">🔒 Security</h3>
                <a href="change-password.php" 
                   class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-lg hover:bg-red-200 transition-colors">
                   Change Password
                </a>
            </div>

            <!-- Notifications -->
            <div>
                <h3 class="text-xl font-semibold mb-4">🔔 Notifications</h3>
                
                <div class="space-y-2">
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="email_notifications" 
                            <?= $email_notifications ? 'checked' : '' ?>
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded">
                        <span class="text-gray-700">Email Notifications</span>
                    </label>

                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="push_notifications" 
                            <?= $push_notifications ? 'checked' : '' ?>
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded">
                        <span class="text-gray-700">Push Notifications</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit" 
                        class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</body>
</html>