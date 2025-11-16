<?php include 'connect.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Daftar Buku</title></head>
<body>
<h2>Book Collection List</h2>
<form method="get">
  <input type="text" name="q" placeholder="Search by title or author" value="<?php echo htmlspecialchars($_GET['q'] ?? ''); ?>">
  <button type="submit">Search</button>
  <a href="form_create_book.php">Add New Book</a>
</form>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Category</th><th>Action</th></tr>
<?php
$q = $conn->real_escape_string($_GET['q'] ?? '');
$sql = "SELECT b.id, b.title, b.author, b.year, c.name as category FROM books b LEFT JOIN categories c ON b.category_id = c.id";
if ($q !== '') {
    $sql .= " WHERE b.title LIKE '%$q%' OR b.author LIKE '%$q%'";
}
$res = $conn->query($sql);
while($row = $res->fetch_assoc()) {
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td><a href="form_detail_book.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></td>';
    echo '<td>'.htmlspecialchars($row['author']).'</td>';
    echo '<td>'.$row['year'].'</td>';
    echo '<td>'.htmlspecialchars($row['category']).'</td>';
    echo '<td><a href="form_update_book.php?id='.$row['id'].'">Edit</a> | <a href="delete.php?id='.$row['id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a></td>';
    echo '</tr>';
}
?>
</table>
</body>
</html>