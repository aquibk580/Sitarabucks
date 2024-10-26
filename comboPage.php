<?php

$coffeeCombos = [
    [
        "name" => "Coffee And Cake Combo",
        "description" => "Classic Black Coffee, Slice of Rich Chocolate Cake",
        "coffee_calories" => "5 Calories (black, no sugar)",
        "cake_calories" => "350 Calories",
        "total_calories" => "355 Calories",
        "price" => 299,
        "image" => "./stocks/m5.jpg"
    ],
    [
        "name" => "Coffee And Donut Combo",
        "description" => "Hot Coffee, Glazed Donut",
        "coffee_calories" => "10 Calories",
        "cake_calories" => "250 Calories",
        "total_calories" => "260 Calories",
        "price" => 249,
        "image" => "./stocks/m4.jpg"
    ]
];

$sweetsCombos = [
    [
        "name" => "Chocolate Cake Combo",
        "description" => "Rich Chocolate Cake with Cream",
        "calories" => "500 Calories",
        "price" => 349,
        "image" => "./stocks/o1.jpg"
    ],
    [
        "name" => "Chocolate Cake Combo",
        "description" => "Rich Chocolate Cake with Cream",
        "calories" => "500 Calories",
        "price" => 349,
        "image" => "./stocks/o2.jpg"
    ],
    [
        "name" => "Chocolate Cake Combo",
        "description" => "Rich Chocolate Cake with Cream",
        "calories" => "500 Calories",
        "price" => 349,
        "image" => "./stocks/o3.jpg"
    ]
];

$foodCombos = [
    [
        "name" => "Burger And Fries Combo",
        "description" => "Juicy Burger with a side of Fries",
        "calories" => "600 Calories",
        "price" => 399,
        "image" => "./stocks/m6.jpg"
    ],
    [
        "name" => "Grilled Chicken And Sandwich Combo",
        "description" => "Grilled Chicken Three-Cheese Sandwich",
        "calories" => "700 Calories",
        "price" => 449,
        "image" => "./stocks/m7.jpg"
    ],
    [
        "name" => "Pizza And Noodles Combo",
        "description" => "Two slices of pizza from any of the following:  Tre Formaggi, Margherita, Hawaiian, Cheese, Garlic And Cheese",
        "calories" => "800 Calories",
        "price" => 799,
        "image" => "./stocks/m9.webp"
    ]
];

$current_page = isset($_GET['page']) ? $_GET['page'] : 'combos';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitarabuks Combos</title>
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
    <script>
        function showCombo(category) {
            document.getElementById('coffee-combos').style.display = 'none';
            document.getElementById('sweets-combos').style.display = 'none';
            document.getElementById('food-combos').style.display = 'none';

            document.getElementById(category).style.display = 'block';
        }
    </script>
</head>

<body class="font-montserrat">

    <!-- Side Nav -->
    <?php include_once("./nav.php"); ?>

    <!-- Main Content -->
    <div class="ml-48 p-10">
        <div class=" p-10">
            <div class="flex justify-center space-x-20 py-8 mb-[30px]">
                <div onclick="showCombo('coffee-combos')" class="cursor-pointer text-center">
                    <div class="w-52 h-52 bg-[#310E05] rounded-full flex items-center justify-center">
                        <img src="./stocks/combo1.png" alt="Coffee Combo Icon" class="w-52 h-52 rounded-full object-cover">
                    </div>
                    <p class="mt-4 text-[#5B3B2B] font-semibold font-montserrat hover:underline">COFFEE COMBO</p>
                </div>
                <div onclick="showCombo('sweets-combos')" class="cursor-pointer text-center">
                    <div class="w-52 h-52 bg-[#570C00] rounded-full flex items-center justify-center">
                        <img src="./stocks/combo2.png" alt="Sweets Combo Icon" class="w-52 h-52 rounded-full object-cover">
                    </div>
                    <p class="mt-4 text-[#5B3B2B] font-semibold font-montserrat hover:underline">SWEET'S COMBO</p>
                </div>
                <div onclick="showCombo('food-combos')" class="cursor-pointer text-center">
                    <div class="w-52 h-52 bg-[#193105] rounded-full flex items-center justify-center">
                        <img src="./stocks/combo3.png" alt="Food Combo Icon" class="w-52 h-52 rounded-full object-cover">
                    </div>
                    <p class="mt-4 text-[#3D5939] font-semibold font-montserrat hover:underline">FOOD COMBO</p>
                </div>
            </div>
        </div>


        <!-- Combo Cards -->
        <div class="space-y-8">

            <div id="coffee-combos" style="display: block;">
                <h2 class="text-3xl font-bold mb-6 text-center font-montserrat">Coffee Combos</h2>
                <?php foreach ($coffeeCombos as $combo): ?>
                    <div class="bg-white rounded-lg shadow-lg p-6 flex mb-6 card">
                        <div class="w-[200px]">
                            <img src="<?= htmlspecialchars($combo['image']); ?>"
                                alt="<?= htmlspecialchars($combo['name']); ?>" class="w-full h-44 object-cover rounded-lg">
                        </div>
                        <div class="w-3/4 pl-6">
                            <h3 class="text-2xl font-poiret"><?= htmlspecialchars($combo['name']); ?></h3>
                            <p class="text-sm text-gray-600 mt-2 font-montserrat">
                                <?= htmlspecialchars($combo['description']); ?>
                            </p>
                            <p class="text-xs text-gray-500 mt-1 font-montserrat">
                                Coffee: <?= htmlspecialchars($combo['coffee_calories']); ?> |
                                Cake: <?= htmlspecialchars($combo['cake_calories']); ?> |
                                Total: <?= htmlspecialchars($combo['total_calories']); ?>
                            </p>
                            <input type="hidden" name="product_price" value="<?= $combo['price'] ?>">
                            <p class="text-xl font-bold mt-4">₹<?= htmlspecialchars($combo['price']); ?></p>

                            <div class="flex justify-between items-center mt-4 btn-cart">
                                <div class="flex items-center">
                                    <button class="quantity-btn minus bg-gray-200 px-2 py-1 rounded-l">-</button>
                                    <span class="quantity-value px-4">1</span>
                                    <button class="quantity-btn plus bg-gray-200 px-2 py-1 rounded-r">+</button>

                                </div>
                                <button
                                    class="bg-[#310E05] text-white py-2 px-6 rounded-lg flex justify-center cart-btn items-center w-[200px]">
                                    <img src="./stocks/grocery-store.png" class="w-5 h-auto mr-3 ml-3" alt="">
                                    <p>CART</p>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Sweets Combos -->
            <div id="sweets-combos" style="display: none;">
                <h2 class="text-3xl font-bold mb-6 text-center font-montserrat">Sweets Combos</h2>
                <?php foreach ($sweetsCombos as $combo): ?>
                    <div class="bg-white rounded-lg shadow-lg p-6 flex mb-6 card">
                        <!-- Image Section -->
                        <div class="w-[200px]">
                            <img src="<?= htmlspecialchars($combo['image']); ?>"
                                alt="<?= htmlspecialchars($combo['name']); ?>" class="w-full h-44 object-cover rounded-lg">
                        </div>
                        <!-- Details Section -->
                        <div class="w-3/4 pl-6">
                            <h3 class="text-2xl font-poiret"><?= htmlspecialchars($combo['name']); ?></h3>
                            <p class="text-sm text-gray-600 mt-2 font-montserrat">
                                <?= htmlspecialchars($combo['description']); ?>
                            </p>

                            <p class="text-xs text-gray-500 mt-1 font-montserrat">
                                <?= htmlspecialchars($combo['calories']); ?>
                            </p>
                            <input type="hidden" name="product_price" value="<?= $combo['price'] ?>">
                            <p class="text-xl font-bold mt-4">₹<?= htmlspecialchars($combo['price']); ?></p>

                            <div class="flex justify-between items-center mt-4 btn-cart">
                                <div class="flex items-center">
                                    <button class="quantity-btn minus bg-gray-200 px-2 py-1 rounded-l">-</button>
                                    <span class="quantity-value px-4">1</span>
                                    <button class="quantity-btn plus bg-gray-200 px-2 py-1 rounded-r">+</button>

                                </div>
                                <button
                                    class="bg-[#310E05] text-white py-2 px-6 rounded-lg flex justify-center cart-btn items-center w-[200px]">
                                    <img src="./stocks/grocery-store.png" class="w-5 h-auto mr-3 ml-3" alt="">
                                    <p>CART</p>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>



            <!-- Food Combos -->
            <div id="food-combos" style="display: none;">
                <h2 class="text-3xl font-bold mb-6 text-center font-montserrat">Food Combos</h2>
                <?php foreach ($foodCombos as $combo): ?>
                    <div class="bg-white rounded-lg shadow-lg p-6 flex mb-6 card">
                        <!-- Image Section -->
                        <div class="w-[200px]">
                            <img src="<?= htmlspecialchars($combo['image']); ?>"
                                alt="<?= htmlspecialchars($combo['name']); ?>" class="w-full h-44 object-cover rounded-lg">
                        </div>
                        <!-- Details Section -->
                        <div class="w-3/4 pl-6">
                            <h3 class="text-2xl font-poiret"><?= htmlspecialchars($combo['name']); ?></h3>
                            <p class="text-sm text-gray-600 mt-2 font-montserrat">
                                <?= htmlspecialchars($combo['description']); ?>
                            </p>
                            <p class="text-xs text-gray-500 mt-1 font-montserrat">
                                <?= htmlspecialchars($combo['calories']); ?>
                            </p>
                            <input type="hidden" name="product_price" value="<?= $combo['price'] ?>">
                            <p class="text-xl font-bold mt-4">₹<?= htmlspecialchars($combo['price']); ?></p>

                            <div class="flex justify-between items-center mt-4 btn-cart">
                                <div class="flex items-center">
                                    <button class="quantity-btn minus bg-gray-200 px-2 py-1 rounded-l">-</button>
                                    <span class="quantity-value px-4">1</span>
                                    <button class="quantity-btn plus bg-gray-200 px-2 py-1 rounded-r">+</button>

                                </div>
                                <button
                                    class="bg-[#310E05] text-white py-2 px-6 rounded-lg flex justify-center cart-btn items-center w-[200px]">
                                    <img src="./stocks/grocery-store.png" class="w-5 h-auto mr-3 ml-3" alt="">
                                    <p>CART</p>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <script src="combo.js"></script>

</body>

</html>