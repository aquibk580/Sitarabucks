<?php
include("../DB/connection.php");
include("../DB/Order.php");
$db = new Database();
$order = new Order($db);
$groupedResults = $order->displayOrders();
if ($groupedResults == []) {
    echo ' <div class="flex flex-col items-center justify-center h-screen">
        <img src="./assets/icons/no-order.png" alt="No Orders" class="w-32 h-32 mb-8 opacity-80">
        <h2 class="text-4xl font-bold text-gray-800">No Orders Found</h2>
        <p class="text-gray-600 mt-4 text-lg">It looks like you havent placed any orders yet.</p>
        <a href="../black_coffee_page.php" class="mt-8 bg-[#310E05] hover:bg-[#231009] text-white py-3 px-6 rounded-lg text-lg transition-all duration-300 shadow-md hover:shadow-lg">
            Start Shopping
        </a>
    </div>';
    return false;
}
?>
<div class="container mx-auto max-w-7xl mt-6">
    <?php foreach ($groupedResults as $group): ?>
        <div class="bg-white shadow-lg rounded-xl p-8 mb-8 transition-all duration-300 hover:shadow-2xl hover:scale-105">
            <!-- Order Information with icon and sleek typography -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a2 2 0 110-4h-4V6m4 0a2 2 0 100-4H9a2 2 0 100 4h4v2H9a2 2 0 010 4h6z"/>
                    </svg> -->
                    <img src="./assets/icons/package.png" class="w-12 h-12 ml-2" alt="">
                    <h2 class="text-4xl font-extrabold text-gray-800">Order No: <?= htmlspecialchars($group['order_no']) ?></h2>
                </div>
                <p class="text-xl font-medium text-gray-600"><span class="text-[#310E05]">📞 Phone:</span> <?= htmlspecialchars($group['phone']) ?></p>
            </div>

            <!-- Products Table with Improved Design -->
            <div class="overflow-hidden border-t border-gray-300 rounded-lg">
                <table class="min-w-full bg-white rounded-lg shadow-md">
                    <thead class="bg-gradient-to-r from-[#310E05] to-[#2e0f06f6] text-white">
                        <tr>
                            <th scope="col" class="py-4 px-6 text-left text-xs font-bold uppercase tracking-wider">
                                Product Name
                            </th>
                            <th scope="col" class="py-4 px-6 text-left text-xs font-bold uppercase tracking-wider">
                                Place
                            </th>
                            <th scope="col" class="py-4 px-6 text-right text-xs font-bold uppercase tracking-wider">
                                Quantity
                            </th>
                            <th scope="col" class="py-4 px-6 text-right text-xs font-bold uppercase tracking-wider">
                                Amount (₹)
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($group['items'] as $item): ?>
                            <tr class="hover:bg-indigo-50 transition-colors duration-200">
                                <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <?= htmlspecialchars($item['pname']) ?>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-600">
                                    <?php
                                    $item['place'] = htmlspecialchars($item['place']);
                                    if ($item['place'] == "dineIn") {
                                        echo "Dine In";
                                    } else if ($item['place'] == "takeAway") {
                                        echo "Take Away";
                                    }
                                    ?>
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap text-sm font-medium text-gray-900">
                                    <?= htmlspecialchars($item['qty']) ?>
                                </td>
                                <td class="py-4 px-6 text-right whitespace-nowrap text-sm font-semibold text-green-600">
                                    ₹<?= htmlspecialchars($item['amount']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</div>