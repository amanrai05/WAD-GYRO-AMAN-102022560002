<?php
include 'connect.php';

// ===============1==============
// If statement to get the GET request from the URL then save it in the id variable
if (isset($_GET['id'])) {
    $id = $_GET['id']; ;

    // ==============2=============
    // Define $delete_query to delete data using $id
    $delete_query = "DELETE FROM movies WHERE id = $id";
    mysqli_query($conn, $delete_query);

    // =============3=============
    // Execute the query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_movies.php");
    } else {
        echo "
        <script>
            alert('Failed to delete book'); 
            window.location='list_movies.php';
        </script>";
        exit;
    }
}

mysqli_close($conn);
