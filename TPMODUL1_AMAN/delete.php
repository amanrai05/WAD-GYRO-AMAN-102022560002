<?php
include_once("config.php");

// Check if ID is provided in URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete record from members table
    $result = mysqli_query($conn, "DELETE FROM members WHERE id=$id");

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID specified for deletion.";
}
?>
