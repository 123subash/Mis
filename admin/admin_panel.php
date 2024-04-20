<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        /* Styling for the form container */
        .form-container {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            transition: border-color 0.5s; /* Animate border color */
            max-width: 400px;
        }

        .form-container:hover {
            border-color: #3498db; /* Change border color on hover */
        }

        /* Styling for the form inputs */
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.5); /* Transparent background */
            transition: border-color 0.5s; /* Animate border color */
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus,
        textarea:focus {
            outline: none;
            border-color: #3498db; /* Change border color on focus */
        }

        /* Styling for the submit button */
        button[type="submit"] {
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.5s; /* Animate background color */
        }

        button[type="submit"]:hover {
            background-color: #2980b9; /* Change background color on hover */
        }
        button:hover span {
  padding-right: 25px;
}

button:hover span:after {
  opacity: 1;
  right: 0;
}
    </style>
</head>
<body>
    <center><h1>S P Business House</h1>
 
</center>
    <div class="container">
        <div class="form-container">
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
                <p>Go To <a href="delete_product.php">Delete</a>Product</p>
                <vr> <center><a href="../home.php">User Mode</a></center>
            </form>
        </div>
    </div>
   
</body>
</html>
