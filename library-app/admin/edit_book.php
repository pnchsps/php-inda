<?php
include('../includes/db.php');
include('../includes/auth.php');
include('../includes/functions.php');

if (!is_logged_in() || !is_admin()) {
    header("Location: ../login.php");
    exit();
}

$id = (int)$_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize($_POST['title']);
    $author = sanitize($_POST['author']);

    $stmt = $conn->prepare("UPDATE books SET title = ?, author = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $author, $id);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
?>
<form method="POST">
    <label>Название: <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required></label><br>
    <label>Автор: <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required></label><br>
    <button type="submit">Сохранить</button>
</form>
