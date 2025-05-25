<?php
include('../includes/db.php');
include('../includes/auth.php');

if (!is_logged_in() || !is_admin()) {
    header("Location: ../login.php");
    exit();
}

$id = (int)$_GET['id'];
$stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: dashboard.php");
exit();
?>
