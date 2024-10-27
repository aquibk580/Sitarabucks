<?php
session_start();
$_SESSION['cart'] = [];
include_once './DB/connection.php';
include_once './DB/Order.php';

if (!isset($_SESSION['order_inserted'])) {
    $database = new Database();
    $db = $database->connect();
    $order = new Order($db);
    $order->phone = $_SESSION['phone'];
    $products = $_SESSION['billData'];
    if (isset($_SESSION['place']) && $_SESSION['place'] != "") {
        if ($_SESSION['place'] == "dineIN") {
            $_SESSION['place'] = "dineIn";
        } else if ($_SESSION['place'] == "takeAway") {
            $_SESSION['place'] = "takeAway";
        } else {
            $_SESSION['place'] = "dineIn";
        }
    } else {
        $_SESSION['place'] = "dineIn";
    }



    if ($order->insertOrder()) {
        foreach ($products as $product) {
            $order->pname = $product['pname'];
            $order->qty = $product['qty'];
            $order->place = $_SESSION['place'];
            $order->amount = ($product['price'] * $product['qty']);
            if (!$order->insertOrderItems()) {
                echo "Failed to insert order items.";
                exit;
            }
        }
        $_SESSION['order_inserted'] = true;
        $_SESSION['order_no'] = $order->order_no;
    } else {
        echo "Order insertion failed.";
    }

    include_once("./PHPMessageSender/MessageSender.php");
    $MessageSender = new MessageSender();
    $MessageSender->ImageSender($_SESSION['phone']);
    $MessageSender->InvoiceSender($_SESSION['phone']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

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

<body class="font-montserrat bg-gray-100">
    <?php include_once('./nav.php') ?>


    <div class="flex flex-wrap mt-2 justify-center items-center h-screen m-0">
        <div class="bg-white rounded-lg shadow-md p-5 w-[380px]">
            <div class="text-center mb-5">
                <div class="flex justify-center items-center mb-2.5">
                    <img src="./assets/icons/logo.jpg" alt="" class="w-28 h-28 rounded-full shadow-md">
                </div>
                <div class="font-bold">
                    Order no : <?= $_SESSION['order_no'] ?>
                </div>
                <?php

                $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

                echo '<div class="text-sm text-gray-600">' . $date->format('g:ia, l, jS F Y') . '</div>';
                ?>
            </div>

            <?php
            echo '<div class="mb-5">';
            $totalPrice = 0;
            foreach ($_SESSION['billData'] as $index => $value) {
                $totalPrice = $_SESSION['Total'];
                echo ' <div class="flex  p-1 justify-between mb-1">
            <span class="font-semibold text-slate-800">' . $value["pname"] . ' <br><span class="font-normal">Quantity : ' . $value['qty'] . '</span></span>
                 <span class="  text-green-950">₹' . ($value["price"] * $value["qty"]) . '</span></div>';
            }
            echo '</div>';

            $tax = floor(18 / 100 * $totalPrice);
            $discountedAmount = floor($_SESSION['coupon'] / 100 * $totalPrice);
            $grandTotal = $totalPrice - $discountedAmount + $tax;

            echo '<div class="border-t-2 pt-2.5">
                <div class="flex justify-between mb-1">
                    <span class="font-bold">Sub Total:</span>
                    <span class="w-32 text-end">₹' . $totalPrice . '</span>
                </div>
                <div class="flex justify-between mb-1">
                <span class="font-bold">Discount' . ($_SESSION['coupon'] === 0 ? '' : '(' . $_SESSION['coupon'] .  '%)') . ':</span>
                <span class=" text-green-600 w-32 text-end ">- ₹' . $discountedAmount . '</span>
            </div>
           <div class="flex justify-between mb-1 border-b-2">
                <span class="font-bold">Tax:</span>
                <span class=" w-32 text-end">+ ₹' . $tax . '</span>
            </div>
            <div class="flex justify-between mb-1 font-bold">
                <span>Grand Total:</span>
                <span class="text-green-600 text-end w-32 font-semibold">₹' . $grandTotal . '</span>
            </div>
            <div class="flex justify-between mb-1 font-bold">
                <span>Mode of payment:</span>
                <span class="w-32 text-end">' . $_SESSION['paymentMode']  . '</span>
            </div>
        </div>';
            ?>
        </div>
        <div class="lg:ml-6">
            <div class="flex mt-5 ml-5">
                <form action="yourbill.php" method="POST">
                    <button class="bg-gray-300 text-gray-800 w-32 px-5 py-2.5 rounded-lg mr-2" name="yourBill">Print bill</button>
                    
                </form>
                <a href="home.php"><button class="bg-sitarabuk-brown text-white w-32 px-5 py-2.5 rounded-lg">Back</button></a>
            </div>
            <div class="flex justify-center mt-5">
                <img src="./assets/icons/paymentkaro.jpg" alt="Google Pay" class="w-60 h-32 ml-6 mix-blend-multiply">
            </div>
        </div>
    </div>
</body>

</html>
<?PHP
if (isset($_POST["yourbill"])) {
    header("Location: yourbill.php");
}
?>