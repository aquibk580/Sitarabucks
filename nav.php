<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitarabuks Navigation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sitarabuk-brown': '#310E05',
                    },
                    fontFamily: {
                        'poiret': ['"Poiret One"', 'cursive'],
                        'montserrat': ['Montserrat', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="font-montserrat flex flex-col min-h-screen">
    <!-- Hamburger Button (Visible only on small devices) -->
    <div class="fixed top-4 left-4 z-50 md:hidden">
        <button id="hamburger" class="text-white focus:outline-none">
            <img id="hamburgerIcon" src="./stocks/hamburger (3).png" alt="Menu" class="w-8 h-auto">
        </button>
    </div>

    <!-- Sidebar Navigation -->
    <nav id="nav" class="bg-[#310E05] top-0 left-0 h-full w-48 flex flex-col text-white pt-20 rounded-r-xl fixed transform -translate-x-full transition-transform duration-200 ease-in-out md:translate-x-0 z-50">
        <!-- Close button inside the sidebar for small devices -->
        <div class="md:hidden absolute top-4 right-4">
            <button id="closeSidebar" class="text-white">
                <img src="./stocks/close.png" alt="Close Sidebar" class="w-8 h-auto">
            </button>
        </div>

        <!-- Logo and Store Info -->
        <div id="navdiv1" class="mb-10 text-center">
            <img src="./stocks/logo.png" alt="Sitarabuks Logo" class="w-20 h-auto mx-auto mb-2">
            <h1 class="font-poiret text-2xl">SITARABUKS</h1>
            <p class="text-sm">SINCE 2001</p>
        </div>

        <!-- Navigation Links -->
        <div id="navLinks" class="flex flex-col space-y-2">
            <a href="home.php" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="home">
                <img src="./stocks/home (2).png" class="w-5 h-auto mr-3 ml-3" alt="">
                <p>HOME</p>
            </a>
            <a href="black_coffee_page.php" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="menu">
                <img src="./stocks/hamburger (1).png" class="w-5 h-auto mr-3 ml-3" alt="">
                <p>MENU</p>
            </a>
            <a href="combopage.php" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="combos">
                <img src="./stocks/food (1).png" class="w-5 h-auto mr-3 ml-3" alt="">
                <p>COMBOS</p>
            </a>
            <a href="offerpage.php" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="offers">
                <img src="./stocks/discount.png" class="w-5 h-auto mr-3 ml-3" alt="">
                <p>OFFERS</p>
            </a>
            <a href="cart.php" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="cart">
                <img src="./stocks/C.png" class="w-5 h-auto mr-3 ml-3" alt="">
                <p>CART</p>
            </a>
        </div>

        <!-- Customer Support -->
        <div id="navdiv3" class="mt-auto flex items-center p-2 pb-5">
            <img src="./stocks/support.png" class="w-10 h-auto mr-2" alt="">
            <h1 class="text-sm">CUSTOMER SUPPORT</h1>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerButton = document.getElementById('hamburger');
            const sidebar = document.getElementById('nav');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeSidebarButton = document.getElementById('closeSidebar');
            const navItems = document.querySelectorAll('.nav-item');

            // Hamburger toggle for mobile view
            hamburgerButton.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                sidebar.classList.toggle('translate-x-0');
                hamburgerIcon.classList.toggle('hidden');
            });

            // Close the sidebar using the button inside the sidebar
            closeSidebarButton.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                hamburgerIcon.classList.remove('hidden');
            });

            // Function to update the active class
            function updateActiveClass() {
                const activePage = localStorage.getItem('activePage') || 'home';
                navItems.forEach(navItem => {
                    if (navItem.getAttribute('data-page') === activePage) {
                        navItem.classList.add('bg-white/20');
                    } else {
                        navItem.classList.remove('bg-white/20');
                    }
                });
            }

            // Navigation links click functionality
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    const page = this.getAttribute('data-page');
                    localStorage.setItem('activePage', page);
                    updateActiveClass();
                });
            });

            // Initialize the active class on page load
            updateActiveClass();
        });
    </script>
</body>
</html>
