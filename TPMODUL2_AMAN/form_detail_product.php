<?php
include("navbar.php");

// connect to db
include("connect.php");

// get id safely
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// sql query
$query = "SELECT * FROM products WHERE id = $id";
$data = mysqli_query($conn, $query);

// fetch single row
$product = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    if (!$product) {
        echo "<div class='container mt-5 text-center'><h3>Product not found!</h3></div>";
        exit;
    }
    ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Product Detail</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Product Details -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="product_name" value="<?= htmlspecialchars($product["product_name"]) ?>" disabled>
                            <label for="product_name">Product Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="category" value="<?= htmlspecialchars($product["category"]) ?>" disabled>
                            <label for="category">Category</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="brand" value="<?= htmlspecialchars($product["brand"]) ?>" disabled>
                            <label for="brand">Brand</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="stock" value="<?= (int)$product["stock"] ?>" disabled>
                            <label for="stock">Stock</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="price" value="<?= 'Rp ' . number_format($product["price"], 0, ',', '.') ?>" disabled>
                            <label for="price">Price</label>
                        </div>

                        <!-- Action Buttons -->
                        <a href="form_update_product.php?id=<?= $id ?>" class="btn btn-warning mb-2 w-100">Edit</a>
                        <a href="delete.php?id=<?= $id ?>" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>