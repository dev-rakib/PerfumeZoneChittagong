<?php
// Define database connection credentials
$host = "localhost";         // Database host (usually localhost)
$user = "root";              // Database username
$password = "ShoJack(120)";  // Database password
$db = "PZC";                 // Database name

try {
    // Attempt to establish a MySQL connection
    $conn = mysqli_connect($host, $user, $password, $db);

    // Check if connection was unsuccessful
    if (!$conn) {
        // Display error message if connection fails
        echo "Connect Unsuccessful! Error: " . mysqli_connect_error();
    }

} catch (Exception $e) {
    // Catch any unexpected exceptions and display error
    echo "ERROR: " . $e->getMessage();
}
?>
