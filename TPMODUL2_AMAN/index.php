<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - EAD Electronics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php"); ?>

    <div class="container mt-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-6 p-3">
                <h1 class="mb-4">Welcome to EAD Electronics Store!</h1>

                <div class="mb-4">
                    <img src="logo-ead.png" alt="EAD Logo" class="img-fluid" style="max-width: 75%;">
                </div>

                <div class="row">
                    <div class="col-md-6 p-2">
                        <a class="btn btn-outline-primary w-100" href="form_create_product.php">Add Product</a>
                    </div>
                    <div class="col-md-6 p-2">
                        <a class="btn btn-outline-secondary w-100" href="list_products.php">View Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>