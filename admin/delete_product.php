<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
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

// Check if a product ID is provided for deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Prepare and execute the SQL statement to delete the product
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();

    // Check if deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Product deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete product');</script>";
    }

    $stmt->close();
}

// Query to fetch products from the database
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

<h1>S P Business House</h1>

<style>
    .product-box {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }
</style>

<section class="products-section">
    <div class="container">
        <?php 
            // Loop through products in batches of 4 to create rows
            for ($i = 0; $i < count($products); $i += 4) {
        ?>
        <div class="row">
            <?php 
                // Loop through 4 products to create columns
                for ($j = $i; $j < $i + 4 && $j < count($products); $j++) {
            ?>
            <div class="col-md-3">
                <div class="product-box">
                    <img src="./images04_FrutoPie_6_pack_484x318.jpg echo $products[$j]['image']; ?>" alt="<?php echo $products[$j]['name']; ?>" class="img-fluid">
                    <h3><?php echo $products[$j]['name']; ?></h3>
                    <p><?php echo $products[$j]['description']; ?></p>
                    <p>Price: $<?php echo $products[$j]['price']; ?></p>
                    <p>Category: <?php echo $products[$j]['category']; ?></p>
                    <p>Stock Quantity: <?php echo $products[$j]['stock_quantity']; ?></p>
                    <p>Manufacturer: <?php echo $products[$j]['manufacturer']; ?></p>
                    <a href="delete_product.php?delete_id=<?php echo $products[$j]['id']; ?>" class="btn btn-danger" onclick="return
                     confirm('Are you sure you want to delete this product?');">Delete</a>
                   
                </div>
                <p>Go To<a href="admin_panel.php">Add </a>Product</p> 
                <a href="../home.php">As User</a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>
