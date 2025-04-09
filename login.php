<?php
// Database connection credentials
$host = "localhost";
$user = "root";
$password = "ShoJack(120)";
$db = "PZC";

try {
    // Attempt to establish a connection to the MySQL database
    $conn = mysqli_connect($host, $user, $password, $db);

    // Check if the connection failed
    if (!$conn) {
        echo "Connection Unsuccessful! Error: " . mysqli_connect_error();
    }

} catch (Exception $e) {
    // Catch any unexpected exceptions and show error
    echo "ERROR: " . $e;
}

// Handle the login form submission (POST method)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form input values
    $email = $_POST["email"];
    $password = $_POST["password"];

    // (Optional) Hash the password — used if you plan to save a new user
    $h_pass = password_hash($password, PASSWORD_DEFAULT); // Not used in login, but left here

    // Prepare SQL query to find the user by email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if any matching user was found
    if (mysqli_num_rows($result) > 0) {
        // Fetch user record from database
        $user = mysqli_fetch_assoc($result);

        // Verify the entered password with the stored hashed password
        if (password_verify($password, $user["password"])) {
            echo "Logged In Successfully!";

            // Start the session and set session variables
            session_start();
            $_SESSION["email"] = $email;

            // Redirect to records page after successful login
            header("Location: records.php");
            exit;

        } else {
            // Password didn't match
            echo "Wrong Password!";
        }
    } else {
        // No user found with given email
        echo "No User Found. Please Signup.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
