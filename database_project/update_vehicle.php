<!DOCTYPE html>
<html>

<head>
    <title>Update Vehicle</title>
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
            $vehicle_id = $_POST['vehicle_id'];
            $new_model = $_POST['new_model'];
            $new_year = $_POST['new_year'];

            // Update query
            $sqlquery = "UPDATE vehicle SET model = '$new_model', year = '$new_year' WHERE vehicle_id = $vehicle_id";

            if ($conn->query($sqlquery) === TRUE) {
                echo "<h2>Vehicle updated successfully</h2>";
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
