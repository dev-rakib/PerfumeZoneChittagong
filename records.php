<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Character encoding and viewport settings for responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link to external CSS file for styling -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Page title -->
    <title>Perfume Zone Chittagong</title>
</head>
<body>
    <!-- Including admin.php file to handle user access or admin-related content -->
    <?php include 'admin.php'; ?>

    <!-- Table to display product details -->
    <table border="1">
        <!-- Table headers to indicate each column -->
        <tr>
            <th>Name</th>         <!-- Product name -->
            <th>Quantity(ml)</th> <!-- Quantity in milliliters -->
            <th>Price</th>       <!-- Product price -->
            <th>Date & Time</th>  <!-- Date and time when the product was listed -->
        </tr>
        
        <?php
        // SQL query to fetch all records from the 'listing' table
        $sql = "SELECT * FROM listing";
        // Execute the query and store the result in $result
        $result = mysqli_query($conn, $sql);

        // Loop through each record in the result set
        while($user = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // Displaying each field (name, quantity, price, sell_time) in a table row
            echo "<td>".$user["name"]."</td>";         // Product name
            echo "<td>".$user["quantity"]."</td>";     // Quantity in milliliters
            echo "<td>".$user["price"]."</td>";        // Product price
            echo "<td>".$user["sell_time"]."</td>";    // Date and time the product was listed
            echo "</tr>";
        }
        ?>
    </table>
    
    <!-- Links for adding new records and searching products -->
    <a href="add.php">Add</a>     <!-- Link to the page for adding new products -->
    <a href="search.php">Search</a> <!-- Link to the page for searching products -->
</body>
</html>
