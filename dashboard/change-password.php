<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 p-6 text-white flex items-center justify-center h-screen">
    <div class="bg-gray-700 p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-blue-400">🔑 Change Password</h2>
        <form>
            <label class="block mb-2">Current Password:</label>
            <input type="password" class="w-full p-3 rounded border-gray-500 shadow bg-gray-600 text-white" placeholder="Enter current password">
            
            <label class="block mt-3 mb-2">New Password:</label>
            <input type="password" class="w-full p-3 rounded border-gray-500 shadow bg-gray-600 text-white" placeholder="Enter new password">
            
            <label class="block mt-3 mb-2">Confirm New Password:</label>
            <input type="password" class="w-full p-3 rounded border-gray-500 shadow bg-gray-600 text-white" placeholder="Confirm new password">
            
            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 w-full">Update Password</button>
        </form>
        <a href="settings.php" class="block text-center text-gray-300 mt-4 hover:underline">Back to Settings</a>
    </div>
</body>
</html>