<?php
// Check if the admin is logged in
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content for the admin dashboard -->
</head>
<body>
    <!-- Add your admin dashboard content here -->
    <h1>Welcome, Admin!</h1>
    <p>This is the admin dashboard.</p>

    <a href="logout.php">Logout</a>

    <!-- Add a button to link to main_page.html -->
    <button onclick="window.location.href='main_page.html'">Go to Main Page</button>
</body>
</html>
