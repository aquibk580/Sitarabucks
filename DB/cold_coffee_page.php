<?php
include("menu_arr.php");
?>
<script>
    var coldCoffeeData = <?php echo json_encode($cold_coffee); ?>;
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Montserrat:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="menu.css">
    <!-- <link rel="stylesheet" href="menu_page.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { 'sitarabuk-brown': '#310E05', },
                    fontFamily: { 'poiret': ['"Poiret One"', 'cursive'], 'montserrat': ['Montserrat', 'sans-serif'], },
                }
            }
        }
    </script>
    <script>
        // Function to change the document title
        function changeTitle(newTitle) { document.title = newTitle; }
        window.onload = function () { changeTitle("Cold Coffee"); };
    </script>
    <title>Cold Coffee</title>
</head>

<body>
    <nav id="nav" class="bg-sitarabuk-brown fixed top-0 left-0 h-full w-48 flex flex-col text-white pt-20 rounded-r-xl">
        <!-- Logo and Store Info -->
        <div id="navdiv1" class="mb-10 text-center">
            <img src="./stocks/menu/logo.jpg" alt="Sitarabuks Logo" class="w-20 h-20 mx-auto mb-2 rounded-full">


            <h1 class="font-poiret text-2xl">SITARABUKS</h1>
            <p class="text-sm">SINCE 2001</p>
        </div>

        <!-- Navigation Links -->
        <?php include_once("./nav.php") ?>  

        <!-- Customer Support -->
        <div id="navdiv3" class="mt-auto flex items-center p-2 pb-5">
            <img src="./stocks/menu/support.png" class="w-10 h-auto mr-2" alt="">
            <h1 class="text-sm">CUSTOMER SUPPORT</h1>
        </div>
    </nav>
    <!-- NAVIGATION BAR END -->
    <div class="main-content">
        <div class="category-menu">
            <div class="category-item">
                <a href="black_coffee_page.php">
                    <img src="stocks\menu\status1.jpg" alt="Black Coffee" class="category-image">
                </a>
                <p>BLACK COFFEE</p>
            </div>
            <div class="category-item">
                <a href="milk_coffee_page.php">
                    <img src="stocks\menu\status2.jpg" alt="Milk Coffee" class="category-image">
                </a>
                <p>MILK COFFEE</p>
            </div>
            <div class="category-item">
            <a href="cold_coffee_page.php">
                <img src="stocks\menu\status3.jpg" alt="Cold Coffee" class="category-image arc">
                </a>
                <p>COLD COFFEE</p>
            </div>
            <div class="category-item">
            <a href="food_page.php">
                <img src="stocks\menu\status4.jpg" alt="Food" class="category-image">
                </a>
                <p>FOOD</p>
            </div>
            <div class="category-item">
            <a href="sweets_page.php">
                <img src="stocks\menu\status5.jpg" alt="Sweets" class="category-image">
                </a>
                <p>SWEETS</p>
            </div>
            <div class="category-item">
            <a href="milk_shake_page.php">
                <img src="stocks\menu\status6.jpg" alt="Sweets" class="category-image">
                </a>
                <p>MILKSHAKE</p>
            </div>
        </div>
        <div class="product-grid">
            <?php
            for ($i = 0; $i < count($cold_coffee); $i++) {
                $imageName = './stocks/menu/MENU_img/cold_coffee_img/' . $cold_coffee[$i]['imgurl'] . '.jpg';
                $price = $cold_coffee[$i]['price'];

                echo '
    <div class="card">
        <div class="card-image">
            <img src="' . $imageName . '" alt="' . $cold_coffee[$i]['name'] . '" class="product-image" onclick="openModal(' . $i . ')">
            <h2 class="coffee-break">Coffee Break</h2>
            <span class="discount">SAVE UP TO ' . $cold_coffee[$i]['discount'] . '%</span>
        </div>
        <div class="card-content">
            <div class="product-name-veg-icon">
                <h3 class="product-name" onclick="openModal(' . $i . ')">' . $cold_coffee[$i]['name'] . '</h3>
                <span class="veg-icon"><img src="./menu_visual/veg.png" alt=""></span>
            </div>
            <p class="offer">' . $cold_coffee[$i]['desc'] . '</p>
            <input type="hidden" name="product_price" value="' . $price . '">
             <p class="price">₹ ' . $price . '</p>
            <div class="rating">';

                // Loop for displaying stars
                $stars = $cold_coffee[$i]['star'];
                for ($j = 1; $j <= 5; $j++) {
                    // Display a filled star image if $j is less than or equal to the number of stars
                    if ($j <= $stars) {
                        echo '<img src="./stocks/menu/star.png" alt="Star" class="star">'; // Replace with your filled star image path
                    } else {
                        echo ' '; // Replace with your empty star image path
                    }
                }

                echo '
            </div>
            <div class="btn-cart">
                <div class="quantity">
                    <button class="quantity-btn minus">-</button>
                    <span class="quantity-value">0</span>
                    <button class="quantity-btn plus">+</button>
                </div>
                <button onclick="addToCart(this)" class="cart-btn">CART</button>
            </div>
        </div>
    </div>';
            }
            ?>

        </div>

        <!-- The Modal -->
        <div id="coldCoffeeModal" class="modal">
            <div class="modal-content">
                <h2 id="modal-title">COLD COFFEE</h2>
                <div class="size-selection">
                    <p>Select Size:</p>
                    <button class="size-btn" onclick="selectSize('Tall')">Tall (250 ml)</button>
                    <button class="size-btn selected" onclick="selectSize('Grande')">Grande (350 ml)</button>
                    <button class="size-btn" onclick="selectSize('Venti')">Venti (450 ml)</button>
                </div>
                <div class="model-desc">
                    <p id="size-description">Select a size to view the details.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="menu.js"></script>
</body>

</html>