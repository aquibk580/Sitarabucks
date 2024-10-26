
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-lg">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="./assets/icons/logo.jpg" alt="Admin Logo" class="h-20 w-20  rounded-full shadow-lg">
        </div>

        <!-- Page Title -->
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Admin Login</h2>

        <!-- Login Form -->
        <form  method="POST">
            <!-- Username Input -->
            <div class="mb-4">
                <label  class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none  focus:border-[#310E05]" placeholder="Enter your username" required>
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none f focus:border-[#310E05]" placeholder="Enter your password" required>
            </div>

            <!-- Login Button -->
            <div class="mb-4">
                <button type="submit" name="login" class="w-full bg-[#310E05] text-white p-3 rounded-md hover:bg-[#310e05f6]  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#310E05]">Login</button>
            </div>

        </form>
    </div>
</body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    // Simple hardcoded credentials
    if($password == 'Admin@123') {
       
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['name'] = $username;
        header("Location: home.php");
        
    } else {
    
   echo' <div id="errorModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
            <!-- Close Button -->
            <button id="closeBtn" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Error Message Content -->
            <div class="text-center">
                <h2 class="text-2xl font-bold text-red-600 mb-4">Error</h2>
                <p class="text-gray-700 mb-6">
                  Invalid Credentials
                </p>
                <button id="closeModalBtn" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none">
                    Close
                </button>
            </div>
        </div>
    </div>
';

}
}
echo"
<script>
// Close modal when the close button is clicked
document.getElementById('closeBtn')?.addEventListener('click', function() {
    document.getElementById('errorModal').style.display = 'none';
});

// Close modal when 'Close' button is clicked
document.getElementById('closeModalBtn')?.addEventListener('click', function() {
    document.getElementById('errorModal').style.display = 'none';
});
</script>";
?>
