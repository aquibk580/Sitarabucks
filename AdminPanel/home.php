<?php
session_start();

if (isset($_POST['confirmlogout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="output.css" rel="stylesheet">

</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Admin Navbar -->
    <nav class="bg-white shadow-md p-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-around items-center h-16">
                <!-- Left side (Logo) -->
                <div class="flex-shrink-0">
                    <a href="#" class="flex flex-row justify-center items-center">
                        <img src="./assets/icons/logo.jpg" alt="Admin Logo" class="h-14 w-14  rounded-full ">
                        <span class="font-semibold text-xl">Sitarabuks</span>
                    </a>
                </div>

                <!-- Center (Admin Name) -->
                <div class="flex-1 flex justify-center items-center">
                    <h1 class="text-xl font-bold text-gray-700">Admin Dashboard</h1>
                </div>

                <!-- Right side (User Icon and Dropdown) -->
                <div class="ml-3 relative">
                    <button id="dropdownButton" class="dropdown-button flex items-center text-sm text-gray-700 focus:outline-none">
                        <img class=" h-10 w-10 rounded-full" src="./assets/icons/admin.png" alt="Admin Icon">
                        <span class="ml-2 font-medium"><?php echo $_SESSION['name']; ?></span>

                    </button>

                    <!-- Dropdown Menu -->
                    <form method="POST" id="dropdown" class="dropdown-menu origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 hidden">

                        <button name="logout" class="w-full flex place-items-center items-center justify-center gap-2  px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><img src="./assets/icons/logout.png" class="h-4 w-4" alt=""> Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-5">
        <div class=" ml-[120px] p-[2px] rounded-lg shadow-lg px-4 py-2 max-w-44 flex flex-row gap-2 place-items-center bg-white border-b border-gray-200">
            <img src="./assets/icons/shopping-bag.png" class="w-10 h-10" alt="">
            <h1 class="font-semibold text-xl"> All Orders</h1>
        </div>

        <?php
        include_once "displayOrders.php";
        ?>

    </main>

    <?php
    if (isset($_POST['logout'])) {
        echo '<div class="flex  justify-center items-start place-items-center z-[1] bg-black bg-opacity-50 backdrop-blur-sm h-screen w-screen absolute top-0 left-0">
                        <div id="popup" class="bg-white rounded-2xl shadow-2xl p-8 max-w-xl w-full mx-4 absolute top-[50%] left-[50%] transform translate-x-[-50%] translate-y-[-50%]">
                            <div class="flex justify-center mb-6">
                                <!-- Replace this with an actual QR code -->
                                <div class="w-44 h-44 flex items-center justify-center object-cover">
                                    <img src="./assets/icons/logo.jpg" class="w-[100%] h-[100%] shadow-md rounded-full" alt="">
                                </div>
                            </div>
                            <h3 class="text-center font-normal">Dear, ' . $_SESSION['name'] . '</h3>
                        <h2 class="text-2xl font-bold text-center mb-6">Are you sure you want to log out?</h2>
                            <form  method="POST" class="flex justify-between gap-4">
                                <a href="home.php" class="bg-[#3D1D0E] shadow-2xl  text-white rounded-full py-2 px-6 w-full text-center">Back</a>
                                <button name="confirmlogout" class="bg-[#3D1D0E] shadow-2xl text-white rounded-full py-2 px-6 w-full text-center">Log Out</button>
                            </form >
                        </div>
                    </div>';
    }

    ?>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dropdown toggle
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdown = document.getElementById('dropdown');

            dropdownButton.addEventListener('click', function() {
                dropdown.classList.toggle('hidden');
            });

            // Close the dropdown when clicking outside
            window.addEventListener('click', function(e) {
                if (!dropdownButton.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>