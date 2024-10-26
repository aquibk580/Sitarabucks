<?php
include("connection.php");
include("Order.php");
$db = new Database();
$order = new Order($db);
$groupedResults = $order->displayOrders();
foreach ($groupedResults as $group) {
    echo "<h2>Order No: {$group['order_no']} | Phone: {$group['phone']}</h2>";
    echo "<table>";
    echo "<tr><th>Product Name</th><th>Category</th><th>Quantity</th><th>Amount</th></tr>";
    foreach ($group['items'] as $item) {
        echo "<tr>";
        echo "<td>{$item['pname']}</td>";
        echo "<td>{$item['category']}</td>";
        echo "<td>{$item['qty']}</td>";
        echo "<td>{$item['amount']}</td>";
        echo "</tr>";
    }
    echo "</table><br>";
}
?>