<!DOCTYPE html>
<html>

<head>
    <title>Add Inventory Item</title>
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
            $item_name = $_POST['item_name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            // Insert query
            $sqlquery = "INSERT INTO inventory (item_name, price, quantity) VALUES ('$item_name', '$price', '$quantity')";

            if ($conn->query($sqlquery) === TRUE) {
                echo "<h2>Item added to the inventory successfully</h2>";
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
