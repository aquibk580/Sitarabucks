<?php
include("./menu_arr.php");
?>
<script>
    var coldCoffeeData = <?php echo json_encode($black_coffee); ?>;
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITARABUKS Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Montserrat:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="menu.css">
    <!-- <link rel="stylesheet" href="menu_page.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Function to change the document title
        function changeTitle(newTitle) {
            document.title = newTitle;
        }
        window.onload = function() {
            changeTitle("Black Coffee");
        };
    </script>
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

<body>
<?php include_once("./nav.php") ?>
    <!-- NAVIGATION BAR END -->
    <div class="main-content">
        <div class="category-menu">
            <div class="category-item">
                <a href="black_coffee_page.php">
                    <img src="stocks\menu\status1.jpg" alt="Black Coffee" class="category-image arc">
                </a>
                <p>BLACK COFFEE</p>
            </div>
            <div class="category-item">
                <a href="./milk_coffee_page.php">
                    <img src="stocks\menu\status2.jpg" alt="Milk Coffee" class="category-image">
                </a>
                <p>MILK COFFEE</p>
            </div>
            <div class="category-item">
                <a href="./cold_coffee_page.php">
                    <img src="stocks\menu\status3.jpg" alt="Cold Coffee" class="category-image">
                </a>
                <p>COLD COFFEE</p>
            </div>
            <div class="category-item">
                <a href="./food_page.php">
                    <img src="stocks\menu\status4.jpg" alt="Food" class="category-image">
                </a>
                <p>FOOD</p>
            </div>
            <div class="category-item">
                <a href="./sweets_page.php">
                    <img src="stocks\menu\status5.jpg" alt="Sweets" class="category-image">
                </a>
                <p>SWEETS</p>
            </div>
            <div class="category-item">
                <a href="./milk_shake_page.php">
                    <img src="stocks\menu\status6.jpg" alt="Sweets" class="category-image">
                </a>
                <p>MILKSHAKE</p>
            </div>
        </div>
        <div class="product-grid">
            <?php
            for ($i = 0; $i < count($black_coffee); $i++) {
                $imageName = './stocks/menu/MENU_img/black_coffee_img/' . $black_coffee[$i]['imgurl'] . '.jpg';
                $price = $black_coffee[$i]['price'];
                echo '
                <div class="card">
                    <div class="card-image">
                        <img src="' . $imageName . '" alt="' . $black_coffee[$i]['name'] . '" class="product-image" onclick="openModal(' . $i . ')">
                        <h2 class="coffee-break">Coffee Break</h2>
                        <span class="discount">SAVE UP TO ' . $black_coffee[$i]['discount'] . '%</span>
                    </div>
                    <div class="card-content">
                        <div class="product-name-veg-icon">
                            <h3 class="product-name" onclick="openModal(' . $i . ')">' . $black_coffee[$i]['name'] . '</h3>
                            <span class="veg-icon"><img src="./menu_visual/veg.png" alt=""></span>
                        </div>
                        <p class="offer">' . $black_coffee[$i]['desc'] . '</p>
                        <input type="hidden" name="product_price" value="' . $price . '">
                        <p class="price">₹ ' . $price  . '</p>
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
                echo '</div>
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
                <h2 id="modal-title">BLACK COFFEE</h2>
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
    <script src="./menu.js"></script>

</body>

</html>












<!-- americano.jpg, black_coffee.jpg,cold_brew.jpg, drip_coffee.jpg, french_press_coffee.jpg, iced_americano.jpg, long_black.jpg, nitro_cold_brew.jpg, pour_over_coffee.jpg, ristretto.jpg -->