<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php") ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Add New Product</h1>

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <form action="create.php" method="POST">
                            <!-- Product Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter product name" required>
                                <label for="product_name">Product Name</label>
                            </div>

                            <!-- Category -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="category" id="category" placeholder="Enter category" required>
                                <label for="category">Category</label>
                            </div>

                            <!-- Brand -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter brand" required>
                                <label for="brand">Brand</label>
                            </div>

                            <!-- Stock -->
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter stock quantity" min="0" required>
                                <label for="stock">Stock</label>
                            </div>

                            <!-- Price -->
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" min="0" required>
                                <label for="price">Price (Rp)</label>
                            </div>

                            <!-- Submit -->
                            <button type="submit" name="create" id="create" class="btn btn-primary w-100 py-2">
                                Add Product
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>