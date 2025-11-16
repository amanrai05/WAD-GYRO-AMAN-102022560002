<?php include 'connect.php'; 
$id = intval($_GET['id'] ?? 0);
$res = $conn->query("SELECT b.*, c.name as category FROM books b LEFT JOIN categories c ON b.category_id=c.id WHERE b.id=$id");
$row = $res->fetch_assoc();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Book Details</title></head>
<body>
<h2>Book Details</h2>
<?php if ($row): ?>
  <p><strong>Title:</strong> <?=htmlspecialchars($row['title'])?></p>
  <p><strong>Author:</strong> <?=htmlspecialchars($row['author'])?></p>
  <p><strong>Year:</strong> <?=$row['year']?></p>
  <p><strong>Category:</strong> <?=htmlspecialchars($row['category'])?></p>
  <p><a href="form_update_book.php?id=<?=$row['id']?>">Edit</a> | <a href="delete.php?id=<?=$row['id']?>" onclick="return confirm('Are you sure?')">Delete</a></p>
<?php else: ?>
  <p>Data tidak ditemukan.</p>
<?php endif; ?>
<p><a href="list_books.php">Back</a></p>
</body>
</html>