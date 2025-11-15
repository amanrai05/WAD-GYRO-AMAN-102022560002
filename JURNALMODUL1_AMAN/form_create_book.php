<?php include 'connect.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Add New Book</title></head>
<body>
<h2>Add New Book - Perpustakaan Cerdas EAD</h2>
<form action="create.php" method="post">
  <label>Title: <input type="text" name="title" required></label><br>
  <label>Author: <input type="text" name="author"></label><br>
  <label>Year: <input type="number" name="year"></label><br>
  <label>Category:
    <select name="category_id">
      <?php
      $res = $conn->query('SELECT id, name FROM categories');
      while($row = $res->fetch_assoc()) { 
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
      }
      ?>
    </select>
  </label><br>
  <button type="submit">Save</button>
</form>
<p><a href="list_books.php">Back to Book List</a></p>
</body>
</html>