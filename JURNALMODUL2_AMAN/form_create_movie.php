<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d1117, #1f2937);
            color: #fff;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background-color: #111827;
            border: 1px solid #2d3748;
            color: #e5e7eb;
        }

        .form-control {
            background-color: #1f2937;
            border: 1px solid #374151;
            color: #fff;
        }

        .form-control:focus {
            background-color: #1f2937;
            border-color: #e50914;
            box-shadow: 0 0 0 0.25rem rgba(229, 9, 20, 0.25);
            color: #fff;
        }

        ::placeholder {
            color: #9ca3af;
            opacity: 1;
        }

        label {
            color: #d1d5db;
        }

        .btn-primary {
            background-color: #e50914;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #b0060f;
        }

        h3 {
            color: #fff;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 600px;">
            <h3 class="mb-4 text-center fw-bold">🎬 Add New Movie</h3>
            <form action="create.php" method="POST">
                <div class="form-floating mb-3">
                    <!-- ====================1================= -->
                    <!-- Fill the name attribute for movie title input -->
                    <input type="text" class="form-control" name="" placeholder="Movie Title" required>
                    <label>Movie Title</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================2================= -->
                    <!-- Fill the name attribute for movie genre input -->
                    <input type="text" class="form-control" name="" placeholder="Genre (Action, Drama, etc.)" required>
                    <label>Genre</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================3================= -->
                    <!-- Fill the name attribute for director input -->
                    <input type="text" class="form-control" name="" placeholder="Director Name" required>
                    <label>Director</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================4================= -->
                    <!-- Fill the name attribute for release year input -->
                    <input type="number" class="form-control" name="" placeholder="Release Year" min="1900" max="<?= date('Y'); ?>" required>
                    <label>Release Year</label>
                </div>

                <button type="submit" name="create" class="btn btn-primary w-100 mt-3">+ Add Movie</button>
            </form>
        </div>
    </div>
</body>

</html>