<?php
include 'connect.php';

// ==============1===============
// If statement to check POST request from the form
// Then define variables to store data sent from POST
if (isset($_POST[''])) {
    $id = intval($_POST['id']); 
    $title = trim($_POST['title'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $director = trim($_POST['director'] ?? '');
    $release_year = trim($_POST['release_year'] ?? '');

    // ===============2===============
    // Define $query to update data using $id
    $query = "UPDATE movies SET title='$title', genre='$genre', director='$director', release_year=$release_year WHERE id=$id";
    mysqli_query($conn, $query);

    // =============3=============
    // Execute the query
    if ( mysqli_affected_rows($conn) > 0 ) {
        header("Location: list_movies.php");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to update movie'); 
            window.location='list_movies.php';
        </script>";
    }
}
