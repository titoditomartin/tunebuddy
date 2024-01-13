<!DOCTYPE html>
<html>

<head>
    <title>View Inventory Item</title>
    <style>
        /* Add your styling if needed */
    </style>
</head>

<body>
    <center>
        <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tunebuddy"; // Change this to your actual database name

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $inventory_id_view = $_GET['inventory_id_view']; // Assuming you have a form field for inventory_id_view

            // Fetch item details query
            $sqlquery = "SELECT * FROM inventory WHERE inventory_id = $inventory_id_view";

            $result = $conn->query($sqlquery);

            if ($result && $result->num_rows > 0) {
                // Display item information
                echo "<h2>Inventory Item Information</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row['inventory_id'] . "</p>";
                    echo "<p>Item Name: " . $row['item_name'] . "</p>";
                    echo "<p>Price: " . $row['price'] . "</p>";
                    echo "<p>Quantity: " . $row['quantity'] . "</p>";
                    // Add more fields if needed
                }
            } else {
                echo "No item found with the provided ID.";
            }
        } else {
            echo "Invalid request method.";
        }

        $conn->close();
        ?>

    </center>
</body>

</html>
