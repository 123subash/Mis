<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include_once 'header.php'; ?>  
<center>
<div class="form1">
    <form action="payment.php" method="post">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
        <br><br>
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
        <br><br>
        <label for="payment-method">Payment Method:</label>
        <select id="payment-method" name="payment-method" required>
            <!-- <option value="cash">Cash</option> -->
            <option value="QR">QR</option>
        </select>
        <br><br>
        <a href="QR.php"><button type="button">Pay Now</button></a>
       
    </form>
    </div>
    </center>
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('images/payment.jpeg');
    background-size: cover;
    background-position: center;
    height: 100vh;
    /* display: flex; */
    align-items: center;
    justify-content: center;
}

.form1{
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 8px;
    height: 200px;
    width: 300px;
}

form label {
    display: block;
    margin-bottom: 5px;
    border: solid blue 0.3px;
    background-color: rgba(255, 255, 255, 0.8);
}

form input,
form select,
form textarea {
    width: calc(100% - 16px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: transparent;
    border: solid green 0.8px;
}

form button {
    width: 100%;
    padding: 10px 20px;
    background-color: #ff6600;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #e55d00;
}

    </style>


</body>
</html>
