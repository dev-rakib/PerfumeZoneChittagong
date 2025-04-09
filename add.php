<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character encoding and responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link to external CSS file for styling -->
    <link rel="stylesheet" href="style.css">

    <title>Perfume Zone Chittagong</title>
</head>
<body>

    <!-- Include the PHP file that handles form submissions and database connection -->
    <?php include "main.php"; ?>

    <!-- Product entry form: sends data to main.php via POST method -->
    <form action="main.php" method="post">
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
        <button type="submit">ADD</button>
    </form>

    <!-- Link to view all sold records -->
    <a href="records.php">Check Sell</a>
</body>
</html>
