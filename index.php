<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "mis_ebusiness"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Signup process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['full_name'];
    $phoneNumber = $_POST['phone-number'];
    $gmail = $_POST['gmail'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $error_message = "Passwords do not match.";
    } else {
        // Check if username already exists
        $check_query = "SELECT * FROM users_signin WHERE username = '$username'";
        $check_result = $conn->query($check_query);
        if ($check_result->num_rows > 0) {
            $error_message = "Username already exists. Please choose a different username.";
        } else {
            // Insert user data into the database
            $insert_query = "INSERT INTO users_signin (full_name, phone_number, gmail, address, username, password) VALUES ('$fullName', '$phoneNumber', '$gmail', '$address', '$username', '$password')";
            if ($conn->query($insert_query) === TRUE) {
                // Signup successful
                header("Location: login.php"); // Redirect to login page
                exit;
            } else {
                $error_message = "Error: " . $conn->error;
            }
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
</head>
<body>

<div class="container">
    <h4>Welcome to S P Business House</h4>
    <form id="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" id="full_name" name="full_name" placeholder="Full Name" required><br>
        <input type="text" id="phone-number" name="phone-number" placeholder="Phone Number" required><br>
        <input type="text" id="gmail" name="gmail" placeholder="Gmail" required><br>
        <input type="text" id="address" name="address" placeholder="Address" required><br>
        <input type="text" id="username" name="username" placeholder="Username" required><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required><br>
        <span id="password-error" class="error"></span><br>
        <input type="submit" id="signup-btn" value="Signup" disabled>
        <span id="form-error" class="error"><?php if(isset($error_message)) { echo $error_message; } ?></span> <!-- Error message for incomplete form -->
        <P>Login As <a href="admin/admin_login.php">Admin</a></P>

    </form>
</div>

<script>
    // Function to check if all fields are filled
    function checkFields() {
        var fullName = document.getElementById('full_name').value;
        var phoneNumber = document.getElementById('phone-number').value;
        var gmail = document.getElementById('gmail').value;
        var address = document.getElementById('address').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm-password').value;

        // Enable signup button if all fields are filled
        if (fullName && phoneNumber && gmail && address && username && password && confirmPassword) {
            document.getElementById('signup-btn').disabled = false;
        } else {
            document.getElementById('signup-btn').disabled = true;
        }
    }

    // Event listeners for input fields
    var inputFields = document.querySelectorAll('input[type="text"], input[type="password"]');
    inputFields.forEach(function(input) {
        input.addEventListener('input', checkFields);
    });

    // Event listener for password confirmation
    document.getElementById('confirm-password').addEventListener('input', function() {
        var password = document.getElementById('password').value;
        var confirmPassword = this.value;

        // Display error message if passwords don't match
        if (password !== confirmPassword) {
            document.getElementById('password-error').innerText = "Password doesn't match";
        } else {
            document.getElementById('password-error').innerText = "";
        }
        checkFields(); // Check all fields again
    });

    // Event listener for form submission
    document.getElementById('signup-form').addEventListener('submit', function(event) {
        var fullName = document.getElementById('full_name').value;
        var phoneNumber = document.getElementById('phone-number').value;
        var gmail = document.getElementById('gmail').value;
        var address = document.getElementById('address').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm-password').value;

        if (!fullName || !phoneNumber || !gmail || !address || !username || !password || !confirmPassword) {
            document.getElementById('form-error').innerText = "Please fill in all fields";
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
</body>
</html>
