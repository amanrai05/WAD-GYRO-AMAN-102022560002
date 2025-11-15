<?php
include 'connect.php';

// ==============1===============
// If statement to check POST request from the form
// Then define variables to store data sent from POST
if (isset($_POST[''])) {
    $title = trim($_POST['title'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $director = trim($_POST['director'] ?? '');
    $release_year = trim($_POST['release_year'] ?? '');

    // ===============2===============
    // Define $query to add data to the database
    $query = "INSERT INTO movies (title, genre, director, release_year) VALUES ('$title', '$genre', '$director', '$release_year')";
    mysqli_query($conn, $query);

    // ==============3================
    // Execute the query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_movies.php");
    } else {
        echo "
        <script>
            alert('Failed to add movie'); 
            window.location='list_movies.php';
        </script>
        ";
        exit;
    }
}
