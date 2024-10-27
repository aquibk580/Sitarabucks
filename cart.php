<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Break</title>
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
    <style>
        .font-poiret {
            font-family: 'Poiret One', cursive;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 font-montserrat">
    <!-- Navigation Bar -->
    <?php session_start();
    unset($_SESSION['order_inserted']);
    include_once("nav.php");
    $cartEmpty = !isset($_SESSION['cart']) || empty($_SESSION['cart']);
    ?>

    <!-- Main Content Area -->
    <div class="lg:ml-56 p-8 flex flex-wrap lg:flex-nowrap place-content-center">
        <!-- Left side content -->

        <div class="flex-1 md:pr-8">


            <?php
            if (!$cartEmpty): // Only show buttons if cart is not empty
            ?>
                <form method="post" class="flex overflow-hidden mb-8">
                    <button id="dineIn" name="place" value="dineIn" class="rounded-l-lg px-4 py-2 bg-[#310E05] text-white font-semibold border border-[#310E05] transition duration-300" onclick="toggleButtonColors(this, document.getElementById('takeAway'))">DINE IN</button>
                    <button id="takeAway" name="place" value="takeAway" class="rounded-r-lg px-4 py-2 bg-white text-[#310E05] font-semibold border border-[#310E05] transition duration-300" onclick="toggleButtonColors(this, document.getElementById('dineIn'))">TAKE AWAY</button>
                </form>
            <?php
            endif; // End of cart check
            ?>


            <!-- Products and Order Items -->
            <div id="orderItems">
                <?php
                include("./printCartArray.php");
                cartData();
                ?>
            </div>
        </div>
        <script>
            function toggleButtonColors(clickedButton, otherButton) {
                // Prevent the default form submission
                // event.preventDefault();

                // Always set the clicked button to brown background and white text
                clickedButton.classList.remove('bg-white', 'text-[#310E05]');
                clickedButton.classList.add('bg-[#310E05]', 'text-white');

                // Always set the other button to white background and brown text
                otherButton.classList.remove('bg-[#310E05]', 'text-white');
                otherButton.classList.add('bg-white', 'text-[#310E05]');

            }

            // Set initial state (Dine In selected by default)
            window.onload = function() {
                const dineInButton = document.getElementById('dineIn');
                const takeAwayButton = document.getElementById('takeAway');
                if (dineInButton && takeAwayButton) {
                    // Ensure Dine In starts as selected (brown background, white text)
                    dineInButton.classList.remove('bg-white', 'text-[#310E05]');
                    dineInButton.classList.add('bg-[#310E05]', 'text-white');

                    // Ensure Take Away starts as unselected (white background, brown text)
                    takeAwayButton.classList.remove('bg-[#310E05]', 'text-white');
                    takeAwayButton.classList.add('bg-white', 'text-[#310E05]');
                }
            };
        </script>

        <!-- Right side content -->
        <div class="w-80 lg:mr-10 mt-20">
            <form method="post">
                <?php
                // Check if cart is empty
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $_SESSION['billData'] = $_SESSION['cart'];
                    // Calculate the subtotal, tax, and grand total if the cart has items
                    if (isset($_SESSION['Total'])) {
                        $subTotal = floatval($_SESSION['Total']);
                    } else {
                        $subTotal = 0;
                    }

                    // Calculate tax (18% of subtotal) and grand total
                    $tax = 18 / 100 * $subTotal;
                    $tax = floor($tax);  // Round tax to 2 decimal places
                    $grandTotal = $subTotal + $tax;
                } else {
                    // Set everything to 0 if the cart is empty
                    $subTotal = 0;
                    $tax = 0;
                    $grandTotal = 0;
                    return false;
                }
                echo '
                <!-- Phone Number Input -->
                <input type="tel" placeholder="Enter phone no" name="phone" class="w-full mb-4 p-2 border border-gray-300 rounded-md" required>

                <!-- Order Summary -->
                <div class="bg-gray-100 rounded-md p-4 mb-4">
                    <div class="flex justify-between mb-2">
                        <span>Sub Total</span>
                        <span id="subTotal">₹ 
                                     ' .   $subTotal . ' </span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>All taxes</span>
                        <span> + ₹' . $tax . '</span>
                    </div>

                    <div class="flex justify-between font-bold mt-2 pt-2 border-t border-gray-300">
                        <span>Total</span>
                        <span id="totalAmount">₹ ' . $grandTotal . '</span>
                    </div>
                </div>';
                ?>

                <!-- Payment Options -->
                <div class="flex justify-between mb-4">
                    <label id="cashLabel" class="flex flex-col cursor-pointer items-center justify-center w-24 h-16 bg-white border border-gray-300 rounded-md transition duration-300">
                        <input type="radio" name="paymentMode" value="cash" class="hidden" onchange="updatePaymentStyle(this)">
                        <img id="cashIcon" src="assets/icons/cashMain.png" alt="Cash" class="w-6 h-6 mb-1 filter brightness-0">
                        <span class="text-xs">CASH</span>
                    </label>
                    <label id="cardLabel" class="flex flex-col cursor-pointer items-center justify-center w-24 h-16 bg-white border border-gray-300 rounded-md transition duration-300">
                        <input type="radio" name="paymentMode" value="card" class="hidden" onchange="updatePaymentStyle(this)">
                        <img id="cardIcon" src="assets/icons/cardMain.png" alt="Card" class="w-6 h-6 mb-1 filter brightness-0">
                        <span class="text-xs">CARD</span>
                    </label>
                    <label id="upiLabel" class="flex flex-col cursor-pointer items-center justify-center w-24 h-16 bg-white border border-gray-300 rounded-md transition duration-300">
                        <input type="radio" name="paymentMode" value="upi" class="hidden" onchange="updatePaymentStyle(this)">
                        <img id="upiIcon" src="assets/icons/upiMain.png" alt="UPI" class="w-6 h-6 mb-1 filter brightness-0">
                        <span class="text-xs">UPI</span>
                    </label>
                </div>

                <script>
                    function updatePaymentStyle(radio) {
                        const labels = ['cashLabel', 'cardLabel', 'upiLabel'];
                        const icons = ['cashIcon', 'cardIcon', 'upiIcon'];

                        labels.forEach((label, index) => {
                            const el = document.getElementById(label);
                            const icon = document.getElementById(icons[index]);
                            if (radio.value === label.replace('Label', '')) {
                                el.classList.remove('bg-white');
                                el.classList.add('bg-[#310E05]', 'text-white');
                                icon.classList.remove('brightness-0');
                                icon.classList.add('brightness-0', 'invert');
                            } else {
                                el.classList.remove('bg-[#310E05]', 'text-white');
                                el.classList.add('bg-white');
                                icon.classList.remove('brightness-0', 'invert');
                                icon.classList.add('brightness-0');
                            }
                        });
                    }
                </script>



                <!-- Coupon Code and Place Order -->
                <div class="flex space-x-2">
                    <input type="text" name="coupon" placeholder="Coupon code" class="flex-grow p-2 border border-gray-300 rounded-md">
                </div>

                <?php
                if ($_SESSION['cart']) {
                }
                if (isset($_POST['coupon'])) {
                    if ($_POST['coupon'] === "SITARA40") {
                        $_SESSION['coupon'] = 40;
                    } else if ($_POST['coupon'] === "SITARA50") {
                        $_SESSION['coupon'] = 50;
                    } else if ($_POST['coupon'] === "SITARA30") {
                        $_SESSION['coupon'] = 30;
                    } else if ($_POST['coupon'] === "SITARA20") {
                        $_SESSION['coupon'] = 20;
                    } else {
                        $_SESSION['coupon'] = 0;
                    }
                }
                ?>
                <button type="submit" name="submit" class="mt-4 w-full bg-sitarabuk-brown text-white rounded-md py-2">Place Order</button>
                <?php
                if (isset($_POST['submit'])) {
                    if (isset($_POST["place"])) {
                        $_SESSION['place'] = $_POST["place"];
                    }

                    if ($_POST['phone']) {
                        $phone = $_POST['phone'];  // Assuming the phone number is posted from a form

                        // Remove any non-numeric characters (spaces, dashes, etc.)
                        $phone = preg_replace('/[^0-9]/', '', $phone);

                        // Check if the phone number is 10 digits long
                        if (strlen($phone) != 10) {
                            echo "<span class='text-red-600 pt-5'>Phone number must be 10 digits long</span>";
                            return false;
                        }
                        $_SESSION['phone'] = $_POST['phone'];
                    }

                    if (isset($_POST['paymentMode'])) {
                        echo '   <div class="flex justify-center items-start place-items-center z-[1] bg-black bg-opacity-50 backdrop-blur-sm h-screen w-screen absolute top-0 left-0">';
                        if ($_POST['paymentMode'] === "cash") {
                            $_SESSION['paymentMode'] = "Cash";
                            echo ' <div id="popup" class="bg-white rounded-3xl shadow-xl p-4 lg:p-8 max-w-md md:max-w-lg w-[90%] sm:w-3/4 lg:w-full absolute top-[50%] left-[50%] transform translate-x-[-50%] translate-y-[-50%]">
    <h2 class="text-xl md:text-2xl font-bold text-center mb-4 md:mb-6">Waiting for payment!</h2>
    <div class="flex justify-center mb-4 md:mb-6">
        <!-- Replace this with an actual QR code -->
        <div class="w-32 h-32 md:w-48 md:h-48 flex items-center justify-center">
            <img src="./assets/icons/cashPopUp.png" class="w-[120px] h-[125px] md:w-[166px] md:h-[171px] mix-blend-multiply" alt="">
        </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between gap-4 w-full">
        <a href="Cart.php" class="bg-[#3D1D0E] text-white rounded-full py-2 px-4 md:px-6 flex-grow text-center">Back</a>
        <a href="./bill.php" class="bg-[#3D1D0E] text-white rounded-full py-2 px-4 md:px-6 flex-grow text-center">Go To Bill</a>
    </div>
</div>

';
                        } else if ($_POST['paymentMode'] === "card") {
                            $_SESSION['paymentMode'] = "Card";
                            echo ' <div id="popup" class="bg-white rounded-3xl shadow-xl p-4 lg:p-8 max-w-md md:max-w-lg w-[90%] sm:w-3/4 lg:w-full absolute top-[50%] left-[50%] transform translate-x-[-50%] translate-y-[-50%]">
    <h2 class="text-xl md:text-2xl font-bold text-center mb-4 md:mb-6">Waiting for payment!</h2>
    <div class="flex justify-center mb-4 md:mb-6">
        <!-- Replace this with an actual QR code -->
        <div class="w-32 h-32 md:w-48 md:h-48 flex items-center justify-center">
            <img src="./assets/icons/cardPopUp.png" class="w-[120px] h-[125px] md:w-[166px] md:h-[171px] mix-blend-multiply" alt="">
        </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between gap-4 w-full">
        <a href="Cart.php" class="bg-[#3D1D0E] text-white rounded-full py-2 px-4 md:px-6 flex-grow text-center">Back</a>
        <a href="./bill.php" class="bg-[#3D1D0E] text-white rounded-full py-2 px-4 md:px-6 flex-grow text-center">Go To Bill</a>
    </div>
</div>
';
                        } else if ($_POST['paymentMode'] === "upi") {
                            $_SESSION['paymentMode'] = "UPI";
                            echo '<div id="popup" class="bg-white rounded-3xl shadow-xl p-4 lg:p-8 max-w-md md:max-w-lg w-[90%] sm:w-3/4 lg:w-full absolute top-[50%] left-[50%] transform translate-x-[-50%] translate-y-[-50%]">
    <h2 class="text-xl md:text-2xl font-bold text-center mb-4 md:mb-6">Waiting for payment!</h2>
    <div class="flex justify-center mb-4 md:mb-6">
        <!-- Replace this with an actual QR code -->
        <div class="w-32 h-32 md:w-48 md:h-48 flex items-center justify-center">
            <img src="./assets/icons/upiPopUp.png" class="w-[120px] h-[125px] md:w-[166px] md:h-[171px] mix-blend-multiply" alt="">
        </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between gap-4 w-full">
        <a href="Cart.php" class="bg-[#3D1D0E] text-white rounded-full py-2 px-4 md:px-6 flex-grow text-center">Back</a>
        <a href="./bill.php" class="bg-[#3D1D0E] text-white rounded-full py-2 px-4 md:px-6 flex-grow text-center">Go To Bill</a>
    </div>
</div>
';
                        }
                        echo ' </div>';
                    } else {
                        echo "<div class='flex text-red-600'>
                                No payment mode selected
                              </div>";
                    }
                    if (isset($_POST['coupon'])) {
                        if ($_POST['coupon'] === "SITARA60") {
                            $_SESSION['coupon'] = 60;
                        } else if ($_POST['coupon'] === "SITARA50") {
                            $_SESSION['coupon'] = 50;
                        } else if ($_POST['coupon'] === "SITARA30") {
                            $_SESSION['coupon'] = 30;
                        } else {
                            $_SESSION['coupon'] = 0;
                        }
                    }
                }

                ?>
            </form>
        </div>

    </div>

    <?php

    // Function to calculate total amount
    function calculateTotal($products)
    {
        $subTotal = 0;
        foreach ($products as $product) {
            $subTotal += $product['price'] * $product['quantity'];
        }
        return $subTotal;
    }

    ?>
</body>

</html>