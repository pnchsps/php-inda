<?php
include('../includes/db.php');
include('../includes/auth.php');
include('../includes/functions.php');

if (!is_logged_in() || !is_admin()) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'admin')");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    echo "Администратор создан.";
}
?>
<form method="POST">
    <label>Логин: <input type="text" name="username" required></label><br>
    <label>Пароль: <input type="password" name="password" required></label><br>
    <button type="submit">Создать администратора</button>
</form>
