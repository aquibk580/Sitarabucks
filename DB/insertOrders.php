<?php

include_once 'connection.php';
include_once 'Order.php';

$database = new Database();
$db = $database->connect();


$order = new Order($db);

$products = array(
    ["pname" => "Cafe Laate", "category" => "Coffee", "qty" => 2, "amount" => 300],

    ["pname" => "Lipton Tea", "category" => "Tea", "qty" => 2, "amount" => 600],

    ["pname" => "Cappuccino", "category" => "Coffee", "qty" => 2, "amount" => 1200],

    ["pname" => "Red Label", "category" => "Tea", "qty" => 2, "amount" => 9000],
);
$order->phone = "1234567890";
if ($order->insertOrder()) {
    foreach ($products as $product) {
        $order->pname = $product['pname'];
        $order->category = $product['category'];
        $order->qty = $product['qty'];
        $order->amount = $product['amount'];
        if (!$order->insertOrderItems()) {
            echo "Failed to insert order items.";
            exit;
        }
    }
    echo "Order inserted successfully. Order No: " . $order->order_no;
} else {
    echo "Order insertion failed.";
}
