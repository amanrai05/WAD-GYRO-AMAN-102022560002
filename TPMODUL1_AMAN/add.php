<?php
include_once(__DIR__ . "/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and sanitize input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
    $major = mysqli_real_escape_string($conn, $_POST['major']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);

    // Insert data into database
    $sql = "INSERT INTO members (name, email, studentID, major, reason)
            VALUES ('$name', '$email', '$studentID', '$major', '$reason')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect back to index after successful insert
        header("Location: index.php");
        exit;
    } else {
        echo "Error adding record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}
?>
