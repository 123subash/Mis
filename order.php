<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: order.php");
    exit;
}

// Retrieve selected products from products.php (assuming it's passed as session data)
$selectedProducts = $_SESSION['selected_products'];

// Function to calculate total amount for the selected products
function calculateTotalAmount($selectedProducts) {
    $totalAmount = 0;
    foreach ($selectedProducts as $product) {
        $totalAmount += $product['price'] * $product['quantity'];
    }
    return $totalAmount;
}

// Calculate total amount
$totalAmount = calculateTotalAmount($selectedProducts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <!-- Add any CSS styles here -->
</head>
<body>
    <h1>Order Summary</h1>

    <?php foreach ($selectedProducts as $product): ?>
        <div class="product">
            <h2><?php echo $product['name']; ?></h2>
            <p>Price: $<?php echo $product['price']; ?></p>
            <label for="quantity_<?php echo $product['id']; ?>">Quantity:</label>
            <input type="number" id="quantity_<?php echo $product['id']; ?>" name="quantity_<?php echo $product['id']; ?>" value="<?php echo $product['quantity']; ?>" min="1">
            <p>Subtotal: $<?php echo $product['price'] * $product['quantity']; ?></p>
        </div>
    <?php endforeach; ?>

    <h2>Total Amount: $<?php echo $totalAmount; ?></h2>

    <form action="payment.php" method="post">
        <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
       <a href="h"></a> <button type="submit">Pay Now</button>
    </form>
</body>
</html>
