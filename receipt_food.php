<?php
// Retrieve the session or data sent via GET (could be saved in session or passed as URL parameters)
$orderDetails = isset($_GET['orderDetails']) ? json_decode($_GET['orderDetails'], true) : null;

if (!$orderDetails) {
    // Redirect if no order details were passed
    header('Location: payment.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="Assets/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .receipt {
            margin-top: 30px;
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .receipt h4, .receipt p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="receipt">
        <h4>Receipt</h4>
        <h5>Order Details:</h5>

        <!-- Display the order date and time -->
        <p><strong>Order Date and Time:</strong> <?php echo htmlspecialchars($orderDetails['orderDateTime']); ?></p>
        <p><strong>Time for Pickup:</strong> <?php echo htmlspecialchars($orderDetails['time']); ?></p>
        <p><strong>Pickup Date:</strong> <?php echo htmlspecialchars($orderDetails['date']); ?></p>

        <h5>Ordered Items:</h5>

        <?php
        $totalPrice = 0;
        foreach ($orderDetails['items'] as $item) {
            echo "<p>{$item['name']} - P {$item['price']} x {$item['quantity']}</p>";
            $totalPrice += $item['price'] * $item['quantity'];
        }
        ?>
        
        <h5><strong>Total: P <?php echo number_format($totalPrice, 2); ?></strong></h5>
    </div>
</div>

<!-- Optional: User can manually print the receipt by pressing the Print button -->
<div class="container mt-4">
    <button class="btn btn-primary" onclick="window.print()">Print Receipt</button>
</div>

</body>
</html>
