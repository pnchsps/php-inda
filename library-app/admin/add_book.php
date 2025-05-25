<?php
include('../includes/db.php');
include('../includes/auth.php');
include('../includes/functions.php');

if (!is_logged_in() || !is_admin()) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize($_POST['title']);
    $author = sanitize($_POST['author']);

    $stmt = $conn->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $author);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>
<form method="POST">
    <label>Название: <input type="text" name="title" required></label><br>
    <label>Автор: <input type="text" name="author" required></label><br>
    <button type="submit">Добавить</button>
</form>
