<?php
include 'connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ===========1============
// Define $query to get movie data by id
$query =  "SELECT * FROM movies WHERE id = $id";
$result = mysqli_query($conn, $query);
$movie = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Movie Details</title>
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
            <h3 class="mb-4 text-center fw-bold">🎬 Edit Movie Details</h3>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= $movie['id'] ?>">

                <div class="form-floating mb-3">
                    <!-- ====================2================= -->
                    <!-- Fill the value attribute using htmlspecialchars for movie title -->
                    <input type="text" class="form-control" name="title" value="" placeholder="Movie Title" required>
                    <label>Movie Title</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================3================= -->
                    <!-- Fill the value attribute using htmlspecialchars for genre -->
                    <input type="text" class="form-control" name="genre" value="" placeholder="Genre (Action, Drama, etc.)" required>
                    <label>Genre</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================4================= -->
                    <!-- Fill the value attribute using htmlspecialchars for director -->
                    <input type="text" class="form-control" name="director" value="" placeholder="Director Name" required>
                    <label>Director</label>
                </div>

                <div class="form-floating mb-3">
                    <!-- ====================5================= -->
                    <!-- Fill the value attribute using (int) for release year -->
                    <input type="number" class="form-control" name="release_year" value="" placeholder="Release Year" min="1900" max="<?= date('Y'); ?>" required>
                    <label>Release Year</label>
                </div>

                <button type="submit" name="update" class="btn btn-primary w-100 mt-3">💾 Save Changes</button>
            </form>
        </div>
    </div>
</body>

</html>