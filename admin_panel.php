<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission to add the product to the database

    // Example: Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mis_ebusiness";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Example: Insert product into the database
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_category = $_POST['product_category'];
    $product_stock_quantity = $_POST['product_stock_quantity'];
    $product_manufacturer = $_POST['product_manufacturer'];

    // Example: Handle image upload
    move_uploaded_file($_FILES['product_image']['tmp_name'], 'images' . $product_image);

    $sql = "INSERT INTO products (name, description, price, image, category, stock_quantity, manufacturer)
            VALUES ('$product_name', '$product_description', '$product_price', '$product_image', 
            '$product_category', '$product_stock_quantity', '$product_manufacturer')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<?php include 'header.php'; ?>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: rgba(255, 255, 255, 0.3);
    border: 2px solid green;
    border-radius: 10px;
    box-shadow: 0 0 10px green;
    padding: 20px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: rgba(255, 255, 255, 0.8);
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    background-color: #333;
    color: white;
    cursor: pointer;
    border-radius: 5px;
}

input[type="submit"]:hover {
    background-color: #555;
}

.error {
    color: red;
}

</style>
<section class="admin-panel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Product</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="product_description">Product Description:</label>
                        <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price:</label>
                        <input type="number" class="form-control" id="product_price" name="product_price" required>
                    </div>
                    <div class="form-group">
                        <label for="product_image">Product Image:</label>
                        <input type="file" class="form-control-file" id="product_image" name="product_image" required>
                    </div>
                    <div class="form-group">
                        <label for="product_category">Category:</label>
                        <input type="text" class="form-control" id="product_category" name="product_category">
                    </div>
                    <div class="form-group">
                        <label for="product_stock_quantity">Stock Quantity:</label>
                        <input type="number" class="form-control" id="product_stock_quantity" name="product_stock_quantity">
                    </div>
                    <div class="form-group">
                        <label for="product_manufacturer">Manufacturer:</label>
                        <input type="text" class="form-control" id="product_manufacturer" name="product_manufacturer">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</section>
<a href="login.php"><button>Login as Users</button></a>
<?php include '/footer.php'; ?>
