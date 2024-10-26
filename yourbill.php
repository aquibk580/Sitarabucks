<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dear Sir/Madam, Your Bill</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<body class="font-montserrat bg-gray-100">

    <!-- without session destroy -->
    <!-- <a href="nav.php" class="text-black cursor-pointer bg-gray-200 shadow-lg rounded-3xl flex absolute top-4 left-2 px-4 py-2 w-24">
    <img  class="w-5 mr-1 font-semibold cursor-pointer" src="./assets/icons/back.png" alt="backkey">
    Back</a> -->
    <!--  with session destroy -->
    <form method="POST">
        <button name="backToHome" class="text-black cursor-pointer  bg-gray-200 shadow-lg rounded-3xl flex justify-center  items-center absolute top-4 left-4 px-4 py-2 ">
            <img class="w-5 mr-1 font-semibold cursor-pointer" src="./assets/icons/back.png" alt="backkey">
            Back To Home</button>
    </form>

    </form>
    <!--  your bill from here , -->
    <div class="flex flex-wrap  justify-center items-center h-screen   m-0 ">
        <div class="bg-white  rounded-lg shadow-lg mt-14  p-5 w-[370px]">
            <div class="text-center mb-5">
                <div class="flex justify-center items-center mb-2.5">
                    <img src="./assets/icons/logo.jpg" alt="" class="w-28 h-28 rounded-full shadow-md">
                </div>
                <div class="font-bold">Order no : <?= $_SESSION['order_no'] ?></div>
                <?php

                $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
                // Format the date


                echo '<div class="text-sm text-gray-600">' . $date->format('g:ia, l, jS F Y') . '</div>';
                ?>
            </div>


            <?php
            echo '<div class="mb-5">';
            $totalPrice = 0;
            foreach ($_SESSION['billData'] as $index => $value) {
                $totalPrice = $_SESSION['Total'];


                // echo $key . "  =  ". $value ."<br>";
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
    <span class=" text-green-600  w-32 text-end ">- ₹' . $discountedAmount . '</span>
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
    <span>' . $_SESSION['paymentMode']  . '</span>
</div>
</div>';
            ?>
        </div>
    </div>
    <!-- <div class="flex justify-center mt-1">
         <img src="./assets/icons/paymentkaro.jpg" alt="Google Pay" class="w-60 h-32  mix-blend-multiply">
            </div> 
             -->


    <script>
        window.print();
    </script>

</body>

</html>
<?php
if (isset($_POST["backToHome"])) {
    //destroy the array of session of cart page and order/bill page
    session_destroy();
    header("Location:./home.php");
}
?>