<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Service Record</title>
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
            $service_id_view = $_GET['service_id_view']; // Assuming you have a form field for service_id_view

            // Fetch service record details query
            $sqlquery = "SELECT * FROM servicerecord WHERE service_id = $service_id_view";

            $result = $conn->query($sqlquery);

            if ($result && $result->num_rows > 0) {
                // Display service record information
                echo "<h2>Service Record Information</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<p>Service ID: " . $row['service_id'] . "</p>";
                    echo "<p>Service Description: " . $row['service_desc'] . "</p>";
                    echo "<p>Vehicle ID: " . $row['vehicle_id'] . "</p>";
                    echo "<p>Service Date: " . $row['service_date'] . "</p>";
                    echo "<p>Price: " . $row['price'] . "</p>";
                }
            } else {
                echo "No service record found with the provided ID.";
            }
        } else {
            echo "Invalid request method.";
        }

        $conn->close();
        ?>

    </center>
</body>
</html>
