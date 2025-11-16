<?php
// connect to db
include("connect.php");

// Create query to display data
$query = "SELECT * FROM products";

// Run query
$data = mysqli_query($conn, $query);

// Store query results into array
$products = [];
while ($product = mysqli_fetch_assoc($data)) {
    $products[] = $product;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">List of Products</h1>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price (Rp)</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)) : ?>
                        <tr>
                            <td colspan="7" class="text-center">NO DATA</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $index => $product) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($product["product_name"]) ?></td>
                                <td><?= htmlspecialchars($product["category"]) ?></td>
                                <td><?= htmlspecialchars($product["brand"]) ?></td>
                                <td><?= (int)$product["stock"] ?></td>
                                <td><?= "Rp " . number_format($product["price"], 0, ',', '.') ?></td>
                                <td>
                                    <a href="form_detail_product.php?id=<?= $product["id"] ?>" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>