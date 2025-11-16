<?php include 'connect.php'; 
$id = intval($_GET['id'] ?? 0);
$res = $conn->query("SELECT * FROM books WHERE id=$id");
$row = $res->fetch_assoc();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit Book</title></head>
<body>
<h2>Edit Book</h2>
<?php if ($row): ?>
<form action="update.php" method="post">
  <input type="hidden" name="id" value="<?=$row['id']?>">
  <label>Title: <input type="text" name="title" value="<?=htmlspecialchars($row['title'])?>" required></label><br>
  <label>Author: <input type="text" name="author" value="<?=htmlspecialchars($row['author'])?>"></label><br>
  <label>Year: <input type="number" name="year" value="<?=$row['year']?>"></label><br>
  <label>Category:
    <select name="category_id">
      <?php
      $resCat = $conn->query('SELECT id, name FROM categories');
      while($c = $resCat->fetch_assoc()) {
        $sel = ($c['id'] == $row['category_id']) ? 'selected' : '';
        echo "<option value='{$c['id']}' $sel>{$c['name']}</option>";
      }
      ?>
    </select>
  </label><br>
  <button type="submit">Update</button>
</form>
<?php else: ?>
  <p>Data tidak ditemukan.</p>
<?php endif; ?>
<p><a href="list_books.php">Back</a></p>
</body>
</html>