<?php
include_once("config.php");

// Check if form is submitted for member update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
    $major = mysqli_real_escape_string($conn, $_POST['major']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);

    // Update member data
    $result = mysqli_query($conn, "UPDATE members SET 
        name='$name', 
        email='$email', 
        studentID='$studentID', 
        major='$major', 
        reason='$reason' 
        WHERE id=$id");

    // Redirect back to homepage
    header("Location: index.php");
    exit;
}
?>

<?php
// Display selected member data based on id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM members WHERE id=$id");

    if (mysqli_num_rows($result) > 0) {
        $member = mysqli_fetch_assoc($result);
    } else {
        echo "Member not found.";
        exit;
    }
} else {
    echo "No ID specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Member</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <h2>Edit Member Details</h2>
  <form name="update_member" method="post" action="edit.php">
    <input type="hidden" name="id" value="<?php echo $member['id']; ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $member['name']; ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $member['email']; ?>" required>

    <label>Student ID:</label>
    <input type="text" name="studentID" value="<?php echo $member['studentID']; ?>" required>

    <label>Major:</label>
    <select name="major" required>
      <option value="">-- Select Major --</option>
      <option value="Information Systems" <?php if ($member['major'] == 'Information Systems') echo 'selected'; ?>>Information Systems</option>
      <option value="Informatics" <?php if ($member['major'] == 'Informatics') echo 'selected'; ?>>Informatics</option>
      <option value="Industrial Engineering" <?php if ($member['major'] == 'Industrial Engineering') echo 'selected'; ?>>Industrial Engineering</option>
    </select>

    <label>Reason for Joining:</label>
    <textarea name="reason" required><?php echo $member['reason']; ?></textarea>

    <button type="submit" name="update">Update</button>
  </form>
  <p style="text-align:center; margin-top:10px;">
    <a href="index.php" style="color:#28a745;">← Back to Home</a>
  </p>
</div>
</body>
</html>
