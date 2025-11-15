<?php
include("navbar.php");

// connect to db
include("connect.php");

// get id safely
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// sql query
$query = "SELECT * FROM products WHERE id = $id";
$data = mysqli_query($conn, $query);

// fetch single product
$product = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    // if no product found
    if (!$product) {
        echo "<div class='container mt-5 text-center'><h3>Product not found!</h3></div>";
        exit;
    }
    ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Update Product Detail</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="update.php" method="POST">
                            <!-- Hidden ID -->
                            <input type="hidden" name="id" value="<?= $product["id"] ?>">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="product_name" id="product_name" value="<?= htmlspecialchars($product["product_name"]) ?>" required>
                                <label for="product_name">Product Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="category" id="category" value="<?= htmlspecialchars($product["category"]) ?>" required>
                                <label for="category">Category</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="brand" id="brand" value="<?= htmlspecialchars($product["brand"]) ?>" required>
                                <label for="brand">Brand</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="stock" id="stock" value="<?= (int)$product["stock"] ?>" required>
                                <label for="stock">Stock</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="price" id="price" value="<?= (int)$product["price"] ?>" required>
                                <label for="price">Price</label>
                            </div>

                            <button type="submit" name="update" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>