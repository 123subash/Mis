<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url('images/payment.jpeg');
    background-size: cover; /* Cover the entire viewport */
    background-position: center; /* Center the background image */
}

.image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    flex-direction: column;
}

.qr-image {
    width: 300px;
    height: 220px;
    
}

.thank-you-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.thank-you-container img {
    width: 200px;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0); }
}

    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    <div class="image-container">
        <img class="qr-image" src="images/qr.jpg" alt="QR Code for Payment">
        <marquee behavior="scroll" direction="right">
        <div class="thank-you-container">
            <img src="images/download (1).jpeg" alt="Thank You">
        </div>
        </marquee>
    </div>
    <footer>
  <p>&copy; 2024 S P Business House</p>
  </footer>
</body>
</html>
