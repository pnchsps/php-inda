<?php
include('../includes/db.php');
include('../includes/auth.php');
include('../includes/header.php');
include('../includes/functions.php');

if (!is_logged_in() || !is_admin()) {
    header("Location: ../login.php");
    exit();
}

$result = $conn->query("SELECT * FROM books");
echo "<h2>Управление книгами</h2>";
echo "<a href='add_book.php'>Добавить книгу</a> | ";
echo "<a href='create_admin.php'>Создать администратора</a>";
echo "<ul>";

while ($row = $result->fetch_assoc()) {
    echo "<li>" . sanitize($row['title']) . " — <a href='edit_book.php?id=" . $row['id'] . "'>Изменить</a> | <a href='delete_book.php?id=" . $row['id'] . "'>Удалить</a></li>";
}
echo "</ul>";

include('../includes/footer.php');
?>
