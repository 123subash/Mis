<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: products.php");
    exit;
}

// Fetch products from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mis_ebusiness";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>

<?php include 'header.php'; ?>

<style>
    .product-box {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 40px;
        background-color: greenyellow;
    }
    .product-container {
        width: 25%;
        float: left;
        padding: 0 15px;
    }
    /* Clearfix to clear the floats */
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<section class="products-section">
    <div class="container">
        <div class="row clearfix">
            <?php foreach ($products as $product) { ?>
                <div class="product-container">
                    <div class="product-box">
                        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid">
                        <h3><?php echo $product['name']; ?></h3>
                        <p><?php echo $product['description']; ?></p>
                        <p>Price: Rs.<?php echo $product['price']; ?></p>
                        <p>Category: <?php echo $product['category']; ?></p>
                        <p>Stock Quantity: <?php echo $product['stock_quantity']; ?></p>
                        <p>Manufacturer: <?php echo $product['manufacturer']; ?></p>
                        <a href="order.php" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
