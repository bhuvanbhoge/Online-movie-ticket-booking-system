<?php

require_once('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

// Your Razorpay Test API Key
$keyId = 'enter your id key';
$keySecret = 'enter your secret key';

$api = new Api($keyId, $keySecret);

// Amount to be charged (in paisa)
$amount = 35000; // Static amount of 500 INR (500 * 100)

// Create a Razorpay order
$order = $api->order->create([
    'amount' => $amount,
    'currency' => 'INR',
    'payment_capture' => 1 // Auto capture
]);

$orderId = $order['id'];
$razorpayPaymentId = '';

$data = [
    'key' => $keyId,
    'amount' => $amount,
    'name' => 'Your Company Name',
    'description' => 'Test Payment',
    'image' => 'https://example.com/your_logo.png', // Your company logo URL
    'order_id' => $orderId,
    'handler' => '',
    'prefill' => [
        'name' => 'Customer Name',
        'email' => 'customer@example.com',
        'contact' => '9999999999'
    ],
    'notes' => [
        'address' => 'Address'
    ],
    'theme' => [
        'color' => '#3399cc'
    ]
];

$displayValues = json_encode($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <script>
        var options = <?php echo $displayValues; ?>;
        options.handler = function (response) {
            // After successful payment, you can handle the response here
            alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
        };
        var rzp = new Razorpay(options);
        rzp.open();
    </script>
</body>
</html>

