<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service Record</title>
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
            $service_id = $_POST['service_id'];
            $new_service_desc = $_POST['new_service_desc'];
            $new_vehicle_id = $_POST['new_vehicle_id'];
            $new_service_date = $_POST['new_service_date'];
            $new_price = $_POST['new_price'];

            // Update query
            $sqlquery = "UPDATE servicerecord 
                         SET service_desc = '$new_service_desc', 
                             vehicle_id = '$new_vehicle_id', 
                             service_date = '$new_service_date', 
                             price = '$new_price' 
                         WHERE service_id = $service_id";

            if ($conn->query($sqlquery) === TRUE) {
                echo "<h2>Service record updated successfully</h2>";
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
