<?php
include('includes/db.php');
include('includes/auth.php');
include('includes/header.php');
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['query'])) {
    $query = "%" . sanitize($_GET['query']) . "%";
    $stmt = $conn->prepare("SELECT * FROM books WHERE title LIKE ? OR author LIKE ?");
    $stmt->bind_param("ss", $query, $query);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2>Результаты поиска:</h2><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . sanitize($row['title']) . "</strong> — " . sanitize($row['author']) . "</li>";
    }
    echo "</ul>";
}
?>
<form method="GET">
    <input type="text" name="query" placeholder="Поиск по книгам" required>
    <button type="submit">Искать</button>
</form>
