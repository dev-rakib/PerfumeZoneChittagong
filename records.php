<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Zone Chittagong</title>
    <link rel="stylesheet" href="records.css">
</head>
<body>

    <?php include 'admin.php'; ?>

    <div class="container">
        <header>
            <h2 class="brand-title">Perfume Zone Chittagong</h2>
            <h1 class="section-title">Sell Record</h1>
        </header>
        <nav>
            <h1>Database Created By &copy;Rakib Chowdhury</h1>
            <a href="login.html">Logout</a>
        </nav>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity (ml)</th>
                        <th>Price</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM listing";
                    $result = mysqli_query($conn, $sql);

                    while($user = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user["id"]."</td>";
                        echo "<td>".$user["name"]."</td>";
                        echo "<td>".$user["quantity"]."</td>";
                        echo "<td>".$user["price"]."</td>";
                        echo "<td>".$user["sell_time"]."</td>";
                        echo "</tr>";
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>

        <section class="actions">
            <h1 class="section-title">Manage Products</h1>
            <div class="button-group">
                <a href="add.php">Add</a>
                <a href="search.php">Search</a>
                <a href="update.php">Update</a>
            </div>
        </section>
    </div>

</body>
</html>
