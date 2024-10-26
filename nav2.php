<?php
// Define the current page. In a real application, you'd determine this dynamically.
$current_page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Function to check if a nav item is active
function is_active($page)
{
    global $current_page;
    return $current_page === $page ? 'bg-white/20' : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Navigation</title>
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

<body class="font-montserrat">
    <nav id="nav" class="bg-sitarabuk-brown fixed top-0 left-0 h-full w-48 flex flex-col text-white pt-20 rounded-r-xl">
        <!-- Logo and Store Info -->
        <div id="navdiv1" class="mb-10 text-center">
            <img src="./assets/icons/logo.jpg" alt="Sitarabuks logo" class="w-20 h-20 mx-auto mb-2 rounded-full">
            <h1 class="font-poiret text-2xl">SITARABUKS</h1>
            <p class="text-sm">SINCE 2001</p>
        </div>

        <!-- Navigation Links -->
        <nav id="nav" class="bg-sitarabuk-brown fixed top-0 left-0 h-full w-48 flex flex-col text-white pt-20 rounded-r-xl">
            <div id="navdiv1" class="mb-10 text-center">
                <img src="./stocks/coffee-cup (2).png" alt="Sitarabuks Logo" class="w-20 h-auto mx-auto mb-2">
                <h1 class="font-poiret text-2xl">SITARABUKS</h1>
                <p class="text-sm">SINCE 2001</p>
            </div>

            <div id="navLinks" class="flex flex-col space-y-2">
                <a href="#" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="home">
                    <img src="./stocks/home (2).png" class="w-5 h-auto mr-3 ml-3" alt="">
                    <p>HOME</p>
                </a>
                <a href="black_coffee_page.php" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="menu">
                    <img src="./stocks/hamburger (1).png" class="w-5 h-auto mr-3 ml-3" alt="">
                    <p>MENU</p>
                </a>
                <a href="#" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="combos">
                    <img src="./stocks/food (1).png" class="w-5 h-auto mr-3 ml-3" alt="">
                    <p>COMBOS</p>
                </a>
                <a href="#" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="offers">
                    <img src="./stocks/discount.png" class="w-5 h-auto mr-3 ml-3" alt="">
                    <p>OFFERS</p>
                </a>
                <a href="cart.php" class="nav-item flex items-center hover:bg-white/20 p-2 cursor-pointer" data-page="cart">
                    <img src="./stocks/grocery-store.png" class="w-5 h-auto mr-3 ml-3" alt="">
                    <p>CART</p>
                </a>
            </div>

            <div id="navdiv3" class="mt-auto flex items-center p-2 pb-5">
                <img src="./stocks/support.png" class="w-10 h-auto mr-2" alt="">
                <h1 class="text-sm">CUSTOMER SUPPORT</h1>
            </div>
        </nav>

        <!-- Customer Support -->
        <div id="navdiv3" class="mt-auto flex items-center p-2 pb-5">
            <img src="./assets/icons/customerSupport.png" class="w-12 h-[42px] m-4 rounded-full" alt="">
            <h1 class="text-sm">CUSTOMER SUPPORT</h1>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');

            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    // e.preventDefault(); // Prevent default link behavior

                    // Remove active class from all items
                    navItems.forEach(navItem => {
                        navItem.classList.remove('bg-white/20');
                    });

                    // Add active class to clicked item
                    this.classList.add('bg-white/20');

                    // Redirect to the href of the clicked item
                    const targetHref = this.getAttribute('href');
                    if (targetHref && targetHref !== '#') {
                        window.location.href = targetHref; // Navigate to the page
                    }

                    console.log('Navigated to:', this.getAttribute('data-page'));
                });
            });
        });
    </script>
</body>

</html>