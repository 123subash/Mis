<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mis_ebusiness";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query database to check if user exists
    $sql = "SELECT * FROM users_signin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, redirect to home page or do further actions
        header("Location: home.php");
        exit;
    } else {
        // Show error message if login fails
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS styles -->
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Transparent background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.3); /* Transparent white */
            border: 2px solid green; /* Green border */
            border-radius: 10px;
            box-shadow: 0 0 10px green; /* Green shadow */
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
            background-color: rgba(255, 255, 255, 0.8); /* Brighter background */
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
<div class="container">
    <h4>Welcome to S P Business House</h4>
    <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" id="username" name="username" placeholder="Username" required><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
        <?php if(isset($error_message)) { echo '<p class="error">' . $error_message . '</p>'; } ?>
        <p>Are you a Admin? <br> Then why are you here Fast Goto <a href="admin/admin_login.php">Login</a>.</p>
        <p>Are you a new user..?> <br> <a href="indexx.php">sign in</a>.</p>
    </form>
</div>

</body>
</html>
