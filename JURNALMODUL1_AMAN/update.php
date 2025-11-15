<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author'] ?? '');
    $year = intval($_POST['year'] ?? 0);
    $category_id = intval($_POST['category_id'] ?? 0);

    $sql = "UPDATE books SET title='$title', author='$author', year=$year, category_id=$category_id WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: list_books.php');
        exit;
    } else {
        echo 'Error: ' . $conn->error;
    }
} else {
    echo 'Invalid request method.';
}
?>