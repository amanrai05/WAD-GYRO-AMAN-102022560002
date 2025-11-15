<?php
// (1) Include database connection
require "connect.php";

// (2) Check if the current request uses POST method
if (isset($_POST["create"])) {
    // a. Get product name
    $productName = $_POST["product_name"];
    // b. Get product category
    $category = $_POST["category"];
    // c. Get product brand
    $brand = $_POST["brand"];
    // d. Get product stock
    $stock = $_POST["stock"];
    // e. Get product price
    $price = $_POST["price"];

    // (3) Run Insert Query
    $query = "INSERT INTO products (product_name, category, brand, stock, price) 
              VALUES ('$productName', '$category', '$brand', '$stock', '$price')";
    mysqli_query($conn, $query);

    // (4) Check if query executed successfully
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_products.php");
    } else {
        echo "
        <script>
            alert('Failed to add product');
            document.location.href = list_products.php;
        </script>
        ";
        exit;
    }
}
