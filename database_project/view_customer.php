<!DOCTYPE html>
<html>

<head>
    <title>View Customer</title>
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
        $dbname = "tunebuddy";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $customer_id_view = $_GET['customer_id_view']; // Assuming you have a form field for customer_id_view

            // Fetch customer details query
            $sqlquery = "SELECT * FROM tunebuddy.customer WHERE customer_id = $customer_id_view";

            $result = $conn->query($sqlquery);

            if ($result && $result->num_rows > 0) {
                // Display customer information
                echo "<h2>Customer Information</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row['customer_id'] . "</p>";
                    echo "<p>Name: " . $row['name'] . "</p>";
                    echo "<p>Contact: " . $row['contact'] . "</p>";
                    echo "<p>Address: " . $row['address'] . "</p>";
                }
            } else {
                echo "No customer found with the provided ID.";
            }
        } else {
            echo "Invalid request method.";
        }

        $conn->close();
        ?>

    </center>
</body>

</html>
