<?php
class MessageSender
{
  private $token = "0i4n4yn1u8uhk5kp";
  private function sendCurlRequest($url, $params)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => http_build_query($params),
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
  }
  function InvoiceSender($number)
  {
    date_default_timezone_set('Asia/Kolkata');
    $date = new DateTime();
    $formattedDate = $date->format('g:ia, l, jS F Y');

    // Prepare the order items list
    $itemsOrdered = "";
    foreach ($_SESSION['billData'] as $item) {
      // Assuming each item is an associative array with keys 'pname', 'qty', and 'price'
      $itemsOrdered .= "• " . $item['pname'] . "\n" .
        "  Quantity: " . $item['qty'] . "\n" .
        "  Price: ₹" . number_format($item['price'], 2) . "\n\n"; // Format price
    }

    $subtotal = $_SESSION['Total'];
    $tax = (int) $subtotal * 0.18;
    $discountedAmount = $_SESSION['coupon'] / 100 * $subtotal;
    $discountApplied = ($_SESSION['coupon'] != 0) ? "**Discount Applied (" . $_SESSION['coupon'] . "%):** -₹" . number_format($discountedAmount, 2) . "\n" : "";
    $totalAmount = ($subtotal - $discountedAmount) + $tax;

    $params = array(
      'token' => $this->token,
      'to' => '+91' . $number,
      'body' => "🛍️ **Order Confirmation from Sitarabuks** 🛍️\n\n" .
        "Dear Valued Customer,\n\n" .
        "We are thrilled to confirm that your order has been received and is being processed. Below are the details of your order:\n\n" .
        "**Order Details:**\n" .
        "----------------------------------\n" .
        "**Order Number:** #" . $_SESSION["order_no"] . "\n" .
        "**Order Date:** " . $formattedDate . "\n\n" .
        "**Items Ordered:**\n" .
        $itemsOrdered .
        "----------------------------------\n" .
        "**Subtotal:** ₹" . number_format($subtotal, 2) . "\n" .
        $discountApplied .
        "**Tax (18%):** ₹" . number_format($tax, 2) . "\n" .
        "----------------------------------\n" .
        "**Total Amount:** ₹" . number_format($totalAmount, 2) . "\n\n" .
        "**Payment Method:**\n" .
        "Payment Type: " . $_SESSION['paymentMode'] . "\n\n" .
        "📞 **Need Assistance?**\n" .
        "We're here to help! Reach out to us:\n" .
        "Phone: 9876543210\n" .
        "Email: sitarabuks@yahoo.com\n" .
        "Website: www.sitarabuks.com\n\n" .
        "Thank you for choosing Sitarabuks. We appreciate your trust in us and look forward to serving you again!\n\n" .
        "Warm Regards,\n" .
        "**Team Sitarabuks**",
    );

    $this->sendCurlRequest("https://api.ultramsg.com/instance97316/messages/chat", $params);
  }


  function ImageSender($number)
  {
    $params = array(
      'token' => $this->token,
      'to' => '+91' . $number,
      'image' => 'https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
      'caption' => "🚀 **Order Confirmation** 🚀\n\n" .
        "**Your Order is Confirmed!**\n" .
        "Thank you for shopping with us.\n\n" .
        "**Order Number:** #" . $_SESSION['order_no'] . "\n\n" .
        "Your order will be ready for pickup in **10 minutes**. Please collect it from the counter.\n\n" .
        "🔗 **Quick Info:**\n" .
        "Should you need any assistance or have any questions, feel free to contact us:\n" .
        "📞 Phone: 9876543210\n" .
        "📧 Email: sitarabuks@yahoo.com\n" .
        "🌐 Website: www.sitarabuks.com\n\n" .
        "We appreciate your business and hope to see you again soon!\n\n" .
        "**Team Sitarabuks**"
    );

    $this->sendCurlRequest("https://api.ultramsg.com/instance97316/messages/image", $params);
  }
}
