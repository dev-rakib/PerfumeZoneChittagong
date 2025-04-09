<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to the external CSS stylesheet for styling -->
    <link rel="stylesheet" href="style.css">
    <title>Search</title>
</head>
<body>
    <!-- Include the admin navigation panel or any other necessary part of the website -->
    <?php include "admin.php" ?>

    <nav>
        <!-- Search form allowing users to search items from the database -->
        <form method="post">
            <!-- Input field for entering search keyword -->
            Search <input type="search" name="search" id="">
            <!-- Button to submit the form -->
            <button type="submit">Search</button>
        </form>
    </nav>

    <table>
        <!-- Table headers to display the data -->
        <tr>
            <th>Name</th>
            <th>Quantity(ml)</th>
            <th>Price</th>
            <th>Date and Time</th>
        </tr>

        <?php
        // Check if the form is submitted via POST method
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            // Get the search input from the form
            $search = $_POST["search"];

            // SQL query to fetch rows where the name matches the search term
            $sql = "SELECT * FROM listing WHERE name = '$search'";

            // Execute the query
            $result = mysqli_query($conn,$sql);

            // Loop through the result set and display each row in the table
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["name"]."</td>";  
                echo "<td>".$row["quantity"]."</td>";  
                echo "<td>".$row["price"]."</td>";  
                echo "<td>".$row["sell_time"]."</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <!-- Links for additional actions or pages -->
    <a href="add.php">ADD</a>
    <a href="records.php">Check All Listing</a>
</body>
</html>
