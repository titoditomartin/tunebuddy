<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service Record</title>
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
            $service_desc = $_POST['service_desc'];
            $vehicle_id = $_POST['vehicle_id'];
            $service_date = $_POST['service_date'];
            $price = $_POST['price'];

            // Insert query
            $sqlquery = "INSERT INTO servicerecord (service_desc, vehicle_id, service_date, price) 
                          VALUES ('$service_desc', '$vehicle_id', '$service_date', '$price')";

            if ($conn->query($sqlquery) === TRUE) {
                echo "<h2>Service record added successfully</h2>";
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
