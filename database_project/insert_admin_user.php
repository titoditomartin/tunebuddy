<?

include 'config.php';

$admin_username = 'admin';
$admin_password = password_hash('admin123', PASSWORD_DEFAULT);
$admin_role = 'admin';

$sql = "INSERT INTO users (username, password, role) VALUES ('$admin_username', '$admin_password', '$admin_role')";

if ($conn->query($sql) === TRUE) {
    echo "Admin user inserted successfully";
} else {
    echo "Error inserting admin user: " . $conn->error;
}

$conn->close();
?>
