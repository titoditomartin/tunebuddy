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

// Check if service_id is provided in the URL
if (isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];

    // Fetch service record details query
    $sqlquery = "SELECT * FROM servicerecord WHERE service_id = $service_id";

    $result = $conn->query($sqlquery);

    if ($result && $result->num_rows > 0) {
        // Fetch service record data
        $row = $result->fetch_assoc();

        // HTML content for the invoice
        $invoiceContent = "
            <html>
            <head>
                <title>Service Invoice</title>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        margin: 20px;
                    }
                    h1, h2 {
                        text-align: center;
                        color: #333;
                    }
                    p {
                        margin: 10px 0;
                    }
                </style>
            </head>
            <body>
                <h1>Service Invoice</h1>
                <h2>Service ID: {$row['service_id']}</h2>
                <p>Service Description: {$row['service_desc']}</p>
                <p>Vehicle ID: {$row['vehicle_id']}</p>
                <p>Service Date: {$row['service_date']}</p>
                <p>Price: {$row['price']}</p>
            </body>
            </html>
        ";

        // Output as PDF or display in the browser (you may need a library like TCPDF or FPDF for PDF creation)
        // For demonstration purposes, we will display it in the browser
        echo $invoiceContent;
    } else {
        echo "No service record found with the provided ID.";
    }
} else {
    echo "Service ID not provided.";
}

$conn->close();
?>
