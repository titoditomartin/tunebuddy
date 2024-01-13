<!DOCTYPE html>
<html>

<head></head>

<body>
    <center>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tunebuddy";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if form is submitted
        
            $customer_id = $_POST['customer_id_update']; // Assuming you have a form field for customer_id
            $new_name = $_POST['new_name'];
            $new_contact = $_POST['new_contact'];
            $new_address = $_POST['new_address'];

            // Update query
            $sqlquery = "UPDATE tunebuddy.customer 
                         SET name = '$new_name', contact = '$new_contact', address = '$new_address' 
                         WHERE customer_id = $customer_id";

            if ($conn->query($sqlquery) === TRUE) {
                echo "Update successful";
                echo "<script>window.location.reload();</script>";  // Reload the page using JavaScript
            } else {
                echo "Error: " . $sqlquery . "<br>" . $conn->error;
            }
          

        $conn->close();
        ?>

    </center>
</body>

</html>
