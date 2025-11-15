<?php
include 'connect.php';
$id = intval($_GET['id'] ?? 0);
if ($id > 0) {
    $conn->query("DELETE FROM books WHERE id=$id");
}
header('Location: list_books.php');
exit;
?>