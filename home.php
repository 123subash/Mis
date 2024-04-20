<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>

    <style>
        body {
            font-family: Poppins, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/choco-pause-button-img.png');
            background-size: cover; /* Cover the entire screen */
            background-repeat: no-repeat; /* Prevent repeating of background image */
            transition: background-image 0.5s ease; /* Apply transition to background image */
        }

        /* Header styling */
        .nav {
            width: 100%;
            height: 20px;
          background-color: grey;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5); /* Add shadow to the header */
        }

        /* Content styling */
        div {
            padding: 20px;
            border-radius: 10px;
            margin: 50px auto; /* Center the div vertically and horizontally */
            max-width: 600px; /* Limit the maximum width of the content */
            background-color: rgba(255, 255, 255, 0.7); /* Add a semi-transparent white background to improve readability */
        }

        h2, p {
            margin: 10px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); /* Add shadow to h2 and p */
        }
    </style>
</head>
<body>
    <div class="nav">
        <nav>
      <b> S P Business House | |  </b>
            <a href="home.php"><button>Home</button></a>*
            <a href="products.php"><button>Products</button></a>*
            <a href="contac.php"><button>Contact</button></a>*
        </nav>
    <div>
        <h2>Welcome to S P Business House</h2>
        <p>Our store is the best place to buy quality products. 
            We have a wide range of products to choose from. Visit our store today!</p>
    </div>
</body>
</html>
