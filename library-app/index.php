<?php
include('includes/db.php');
include('includes/auth.php');
include('includes/header.php');
include('includes/functions.php');

$sql = "SELECT * FROM books ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);

echo "<h2>Новые книги</h2><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li><strong>" . sanitize($row['title']) . "</strong> — " . sanitize($row['author']) . "</li>";
}
echo "</ul>";

include('includes/footer.php');
?>
