<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character encoding and responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link to external CSS file for styling -->
    <link rel="stylesheet" href="update.css">

    <title>Perfume Zone Chittagong</title>
</head>
<body>

    <!-- Include the PHP file that handles form submissions and database connection -->
    <?php include "updt.php"; ?>
    <h1>List</h1>
    <!-- Table to display product details -->
    <table border="1">
        <!-- Table headers to indicate each column -->
        <tr>
            <th>ID</th>
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
            echo "<td>".$user["id"]."</td>";
            echo "<td>".$user["name"]."</td>";         // Product name
            echo "<td>".$user["quantity"]."</td>";     // Quantity in milliliters
            echo "<td>".$user["price"]."</td>";        // Product price
            echo "<td>".$user["sell_time"]."</td>";    // Date and time the product was listed
            echo "</tr>";
        }
        mysqli_close($conn);
        ?>
    </table><br>

    <h1>Update Listing</h1>

    <!-- Product entry form: sends data to main.php via POST method -->
    <form action="updt.php" method="post">
        ID:
        <input type="number" name="id" id="">
        <!-- Product Name input -->
        Name: 
        <input type="text" name="name" required>

        <!-- Product Quantity in ml -->
        Quantity(ml): 
        <input type="text" name="quantity" required>

        <!-- Product Price input -->
        Price: 
        <input type="number" name="price" required>

        <!-- Optional Date input with time -->
        Date: 
        <input type="datetime-local" name="date">

        <!-- Submit button to add the product -->
        <button type="submit">Update</button>
    </form>


    <!-- Link to view all sold records -->
    <a href="records.php">Check</a>
</body>
</html>
