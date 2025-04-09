<?php
// Database connection details
$host = "localhost";  // Database host (localhost means it is on the same server)
$user = "root";  // Database username (root is default for local MySQL)
$password = "ShoJack(120)";  // Database password
$db = "PZC";  // Database name

// Try to establish a connection to the MySQL database
try {
    // Create connection using MySQLi
    $conn = mysqli_connect($host, $user, $password, $db);

    // Check if the connection is successful
    if (!$conn) {
        // If the connection fails, print an error message
        echo "Connect Unsuccessful! error: " . mysqli_connect_error();
    }

} catch (Exception $e) {
    // Catch any exceptions and display the error message
    echo "ERROR: $e";
}

// Check if the form has been submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $username = $_POST["username"];  // User's entered username
    $email = $_POST["email"];  // User's entered email address
    $password = $_POST["password"];  // User's entered password

    // Hash the password before storing it in the database for security
    $h_pass = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert the new user's data into the 'users' table
    $sql = "INSERT INTO users VALUES ('$username', '$email', '$h_pass')";

    // Execute the query and check if it was successful
    if (mysqli_query($conn, $sql)) {
        // If successful, display a thank you message and redirect to login page
        echo "Thanks For Signing up $username";
        header("location: login.html");  // Redirect to login page after successful signup
    } else {
        // If there is an issue with the query, display an error message
        echo "Something's Wrong!";
    }
}

// Close the database connection
mysqli_close($conn);
?>
