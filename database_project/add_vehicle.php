<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tunebuddy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data safely
    $customerType = $_POST['customer_type'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $model = $_POST['model'] ?? '';
    $year = $_POST['year'] ?? '';

    // Additional fields for new customer
    $customerName = $_POST['customer_name'] ?? '';
    $customerContact = $_POST['customer_contact'] ?? '';

    // Additional fields for existing customer
    $existingCustomerID = $_POST['existing_customer_id'] ?? '';

    // Insert data into the database based on customer type
    if ($customerType === 'new') {
        // Insert data for new customer
        $sql = "INSERT INTO customer (name, contact) VALUES ('$customerName', '$customerContact')";
        $conn->query($sql);

        // Get the auto-generated customer ID
        $customerID = $conn->insert_id;

        // Insert data for the vehicle
        $sql = "INSERT INTO vehicle (customer_id, brand, model, year) VALUES ('$customerID', '$brand', '$model', '$year')";
        if ($conn->query($sql) === TRUE) {
            echo "New vehicle added successfully for a new customer";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($customerType === 'existing') {
        // Insert data for the vehicle with an existing customer ID
        $sql = "INSERT INTO vehicle (customer_id, brand, model, year) VALUES ('$existingCustomerID', '$brand', '$model', '$year')";
        if ($conn->query($sql) === TRUE) {
            echo "New vehicle added successfully for an existing customer";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
