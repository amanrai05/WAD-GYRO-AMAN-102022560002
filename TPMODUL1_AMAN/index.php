<?php
// Include database configuration
include_once("config.php");

// Fetch all members data from database
$result = mysqli_query($conn, "SELECT * FROM members ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Membership Registration Form - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="EAD Logo" class="logo">
  <h2>Membership Registration Form - EAD Laboratory</h2>

  <!-- Registration Form -->
  <form method="POST" action="add.php">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Student ID:</label>
    <input type="text" name="studentID" required>

    <label>Major:</label>
    <select name="major" required>
      <option value="">-- Select Major --</option>
      <option value="Information Systems">Information Systems</option>
      <option value="Informatics">Informatics</option>
      <option value="Industrial Engineering">Industrial Engineering</option>
    </select>

    <label>Reason for Joining:</label>
    <textarea name="reason" required></textarea>

    <button type="submit">Register</button>
  </form>

  <h3 style="margin-top:20px;">Registered Members</h3>
  <table border="1" width="100%" style="border-collapse:collapse;">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Student ID</th>
      <th>Major</th>
      <th>Reason</th>
      <th>Action</th>
    </tr>

    <?php  
    if (mysqli_num_rows($result) > 0) {
        while($member = mysqli_fetch_assoc($result)) {         
            echo "<tr>";
            echo "<td>".$member['id']."</td>";
            echo "<td>".$member['name']."</td>";
            echo "<td>".$member['email']."</td>";    
            echo "<td>".$member['studentID']."</td>";    
            echo "<td>".$member['major']."</td>";    
            echo "<td>".$member['reason']."</td>";    
            echo "<td>
                    <a href='edit.php?id=".$member['id']."'>Edit</a> | 
                    <a href='delete.php?id=".$member['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                  </td>";
            echo "</tr>";        
        }
    } else {
        echo "<tr><td colspan='7' style='text-align:center;'>No members found.</td></tr>";
    }
    ?>
  </table>
</div>
</body>
</html>
