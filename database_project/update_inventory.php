<!DOCTYPE html>
<html>

<head>
    <title>Update Inventory Item</title>
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
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $inventory_id = $_POST['inventory_id'];
            $new_price = $_POST['new_price'];
            $new_quantity = $_POST['new_quantity'];

            // Update query
            $sqlquery = "UPDATE inventory SET price = '$new_price', quantity = '$new_quantity' WHERE inventory_id = $inventory_id";

            if ($conn->query($sqlquery) === TRUE) {
                echo "<h2>Item updated successfully</h2>";
            } else {
                echo "Error: " . $sqlquery . "<br>" . $conn->error;
            }
        } else {
            echo "Invalid request method.";
        }

        $conn->close();
        ?>

    </center>
</body>

</html>
