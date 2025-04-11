<?php
// Database connection credentials
$host = "localhost";         // Database host (usually localhost)
$user = "root";              // Database username (default is root for localhost)
$password = "ShoJack(120)";  // Database password
$db = "PZC";                 // Database name

try {
    // Attempt to establish a connection to the MySQL database
    $conn = mysqli_connect($host, $user, $password, $db);

    // Check if the connection failed
    if (!$conn) {
        // Display an error message if connection is unsuccessful
        echo "Connection Unsuccessful! Error: " . mysqli_connect_error();
    }

} catch (Exception $e) {
    // Catch any unexpected exceptions and show error
    echo "ERROR: " . $e;
}

// Check if the form has been submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the form input values using $_POST
    $id = $_POST["id"];
    $name = $_POST["name"];        // Name of the product
    $price = $_POST["price"];      // Price of the product
    $date = $_POST["date"];        // Date when the product is added (datetime-local format)
    $quantity = $_POST["quantity"]; // Quantity of the product (in ml)

    try {
        // SQL query to insert the form data into the 'listing' table
        // The query includes placeholder values for name, price, date, and quantity
        $sql = "UPDATE listing SET name = '$name', price = '$price', sell_time = '$date', quantity = '$quantity' WHERE id = '$id'";

        // Execute the query and check if it's successful
        if (mysqli_query($conn, $sql)) {
            // If the query is successful, display a success message
            echo "Record Updated Successfully!";

            // Redirect to the 'add.php' page after successful insertion
            header("Location: records.php");

        } else {
            // If the query execution fails, display an error message
            echo "Something's Wrong!";
        }

    } catch (Exception $e) {
        // Catch any exceptions that occur during query execution and display the error
        echo "ERROR: " . $e;
    }
}

// Close the database connection after operations are complete
// mysqli_close($conn);
?>
