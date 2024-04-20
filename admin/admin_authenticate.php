<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_panel.php");
        exit;
    } else {
        $_SESSION['admin_logged_in'] = false;
        header("Location: admin_login.php?error=1");
        exit;
    }
} else {
    header("Location: admin_login.php");
    exit;
}
?>
