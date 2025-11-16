<?php
// connect to database
require "connect.php";

// make sure user clicked update button
if (isset($_POST["update"])) {
    // get unique id
    $id = $_POST["id"];

    // get all input data
    $productName = $_POST["product_name"];
    $category    = $_POST["category"];
    $brand       = $_POST["brand"];
    $stock       = $_POST["stock"];
    $price       = $_POST["price"];

    // sql query
    $query = "UPDATE products SET
                product_name='$productName',
                category='$category',
                brand='$brand',
                stock='$stock',
                price='$price'
              WHERE id=$id";

    // execute sql query
    $test = mysqli_query($conn, $query);

    // check query execution
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_products.php");
    } else {
        echo "
        <script>
            alert('Failed to update product');
            document.location.href = list_products.php;
        </script>
        ";
        exit;
    }
}
