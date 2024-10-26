<?php
function cartData()
{

    if (isset($_POST['removeBtn'])) {
        $removeIndex = intval($_POST['removeBtn']); // Get the index of the product to remove
        unset($_SESSION['cart'][$removeIndex]); // Remove the product from the cart
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the cart array
        // header('Location: ' . $_SERVER['PHP_SELF']); // Redirect to refresh the cart display
    }

    // Check if the cart is set and not empty
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo '<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 pb-56 pl-60">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <img src="./stocks/empty-cart.png" alt="Empty Cart" class="w-32 h-32 mx-auto mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Your Cart is Empty</h2>
        <p class="text-gray-600 mb-6">Looks like you havent added anything to your cart yet. Start exploring and find something you love!</p>
        <a href="black_coffee_page.php" class="bg-[#310E05] hover:bg-[#4a1607] text-white px-5 py-3 rounded-lg transition duration-300 ease-in-out shadow-md">Shop Now</a>
    </div>
</div>
';
        return;
    }

    $_SESSION['Total'] = 0;

    // Filter out invalid or null values in the cart array
    $products = array_filter($_SESSION['cart'], function ($product) {
        return is_array($product) && isset($product['pname'], $product['qty'], $product['price'], $product['productImage']);
    });

    // If no valid products are found, show a message
    if (empty($products)) {
        echo '<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100  pb-56 pl-60">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <img src="./stocks/empty-cart.png" alt="Empty Cart" class="w-32 h-32 mx-auto mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Your Cart is Empty</h2>
        <p class="text-gray-600 mb-6">Looks like you havent added anything to your cart yet. Start exploring and find something you love!</p>
        <a href="black_coffee_page.php" class="bg-[#310E05] hover:bg-[#4a1607] text-white px-5 py-3 rounded-lg transition duration-300 ease-in-out shadow-md">Shop Now</a>
    </div>
</div>
';
        return;
    }

    // Loop through the products in the cart and display them
    foreach ($products as $index => $product) {
        // Calculate total price for the product
        $totalPrice = floatval($product['price']) * intval($product['qty']);
        $_SESSION['Total'] += $totalPrice;

        echo '
        <div class="w-full max-w-xl   rounded-xl shadow-lg hover:scale-[1.1]  transition duration-300 mb-4">
            <div class="flex items-center justify-between bg-white pr-3 rounded-md"> 
                <img src="' . htmlspecialchars($product['productImage']) . '" alt="' . htmlspecialchars($product['pname']) . '" class="w-24 h-24 object-cover rounded-l-lg ">
                <div class="flex-1 ml-4">
                    <h3 class="font-semibold">' . htmlspecialchars($product['pname']) . '</h3>
                    <p class="text-gray-600">₹' . htmlspecialchars($product['price']) . ' x ' . intval($product['qty']) . '</p>
                </div>
                <form method="post" class="flex items-center space-x-2">
                    <span class="font-semibold">₹' . number_format($totalPrice, 2) . '</span>
                     <button type="submit" name="removeBtn" value="' . $index . '" class="w-4 h-4 cursor-pointer">
                        <img src="./stocks/trash.png" alt="Delete" class="w-4 h-4 cursor-pointer">
                    </button>
                   
                </form>
            </div>
        </div>
        ';
    }
}
