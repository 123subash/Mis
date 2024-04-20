<html>
    <body>
        
<header>
    <div class="logo">
        <img src="images/logo.jpeg" alt="Logo">
        <h1>S P Business House</h1>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contac.php">Contact Us</a></li>
        </ul>
    </nav>
</header>
<style>
    
    header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px; /* Add margin for spacing */
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links li a {
            color: white;
            text-decoration: none;
        }

        .nav-links li a:hover {
            color: #ddd;
        }

        /* Center h1 in the navbar */
        h1 {
            margin: 0;
            color: white;
            font-size: 1.5rem;
            text-align: center; /* Center text */
            flex-grow: 1; /* Grow to fill remaining space */
            text-shadow: 2px 2px greenyellow;
        }

        /* Media Query for Responsive Design */
        @media screen and (max-width: 600px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                margin-top: 10px;
            }

            .nav-links li {
                margin-right: 10px;
            }

            .logo img {
                width: 40px;
                height: 40px;
            }

            h1 {
                text-align: left; /* Align h1 to the left on smaller screens */
            }
        }
</style>

</body>
</html>