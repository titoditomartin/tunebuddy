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
        //else {echo "Success";}
        /*
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Debug: Output the contents of $_POST
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';

            $Name = $_POST["Name"] ?? '';
            $Contact = $_POST["Contact"] ?? '';
            $Address = $_POST["Address"] ?? '';

            $sql = "INSERT INTO customer (name, contact, address) VALUES ('$Name', '$Contact', '$Address')";

            if ($conn->query($sql) === TRUE) {
                echo "<center><h3>Data stored in the database successfully.</h3></center>";
                echo "<center><p>Browse your database management tool to view the updated data.</p></center>";
                echo "<center><p>Name: $name<br>Contact: $contact<br>Address: $address</p></center>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }*/

        //if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $Name = $_REQUEST['name'];
            $Contact = $_REQUEST['contact'];
            $Address = $_REQUEST['address'];

        
            
        //}


        $sqlquery = "INSERT INTO tunebuddy.customer (name, contact, address) VALUES
                    ('$Name', '$Contact', '$Address')";

        /*if ($conn->query($sqlquery) === TRUE) {
                echo "Success";}
        else {
                echo "Error data entry";
                
        }*/

        if ($conn->query($sqlquery) === TRUE) {
            echo "Success";
            echo "<script>window.location.reload();</script>";  // Reload the page using JavaScript

            // Redirect to the same page after inserting data
            header("Location: {$_SERVER['PHP_SELF']}");
            exit(); // Make sure to exit after the header to prevent further execution
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
        }
    
        
        
        

        $conn->close();

        ?>

        </center>
    </body>
</html>