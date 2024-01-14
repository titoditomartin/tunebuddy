<!DOCTYPE html>
<html>

<head>
    <title>View Vehicle</title>
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
            $vehicle_id_view = $_GET['vehicle_id_view']; // Assuming you have a form field for vehicle_id_view

            // Fetch vehicle details query
            $sqlquery = "SELECT * FROM vehicle WHERE vehicle_id = $vehicle_id_view";

            $result = $conn->query($sqlquery);

            if ($result && $result->num_rows > 0) {
                // Display vehicle information
                echo "<h2>Vehicle Information</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row['vehicle_id'] . "</p>";
                    echo "<p>Brand: " . $row['brand'] . "</p>";
                    echo "<p>Model: " . $row['model'] . "</p>";
                    echo "<p>Year: " . $row['year'] . "</p>";
                    // Add other fields as needed
                }
            } else {
                echo "No vehicle found with the provided ID.";
            }
        } else {
            echo "Invalid request method.";
        }

        $conn->close();
        ?>
    </center>
</body>

</html>
