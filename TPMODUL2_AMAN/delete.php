<?php
// Include the database connection
require "connect.php";

// (2) Capture the "id" value of the product
if (isset($_GET['id'])) {
    $id = $_GET["id"];

    // (3) Create SQL DELETE command to remove data from table based on product id
    $delete_query = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $delete_query);

    // (4) Condition if query executed successfully
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_products.php");
    } else {
        echo "
        <script>
            alert('Failed to delete product');
            document.location.href = list_products.php;
        </script>
        ";
        exit;
    }
}

// Close the database connection after finishing
mysqli_close($conn);
