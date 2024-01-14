<?php
session_start();

include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include your database connection
    include 'config.php'; // Adjust the filename if necessary

    // Check username and password
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$input_username' AND password = '$input_password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Authentication failed
        echo "Invalid username or password. Please try again.";
    }
}

// Close the database connection
$conn->close();
?>
