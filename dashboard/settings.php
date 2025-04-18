<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white p-6 text-white">
    <h2 class="text-3xl font-bold mb-6 text-blue-400">⚙️ Settings</h2>
    
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg space-y-6">
        
        <div>
            <h3 class="text-xl font-semibold mb-3">👤 Profile Settings</h3>
            <label class="block mb-2">Name:</label>
            <input type="text" class="w-full p-3 rounded border-gray-500 shadow bg-gray-600 text-white" placeholder="Tarak Mehta">
            <label class="block mt-3 mb-2">Email:</label>
            <input type="email" class="w-full p-3 rounded border-gray-500 shadow bg-gray-600 text-white" placeholder="TM@gmail.com">
            <label class="block mt-3 mb-2">Profile Picture:</label>
            <input type="file" class="w-full p-2 rounded border-gray-500 shadow bg-gray-600 text-white">
        </div>
        
        
        <div>
            <h3 class="text-xl font-semibold mb-3">🔒 Security & Privacy</h3>
            <a href="change-password.php" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 inline-block">Change Password</a>
        </div>
        
        
        <div>
            <h3 class="text-xl font-semibold mb-3">🔔 Notification Preferences</h3>
            <label class="flex items-center space-x-2">
                <input type="checkbox" checked class="accent-blue-500">
                <span>Email Notifications</span>
            </label>
            <label class="flex items-center space-x-2 mt-2">
                <input type="checkbox" class="accent-blue-500">
                <span>Push Notifications</span>
            </label>
        </div>
        <div class="flex justify-end mt-6">
            <button class="bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700">Save Changes</button>
        </div>      
    </div>
    
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
</body>
</html>
