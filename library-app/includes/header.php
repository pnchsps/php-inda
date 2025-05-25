<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Library App</title>
    <link rel="stylesheet" href="/library-app/assets/style.css">
</head>
<body>
<header>
    <h1>Система управления библиотекой</h1>
    <nav>
        <a href="/library-app/index.php">Главная</a>
        <a href="/library-app/search.php">Поиск</a>
        <?php if (is_admin()): ?>
            <a href="/library-app/admin/dashboard.php">Админка</a>
        <?php endif; ?>
        <?php if (is_logged_in()): ?>
            <a href="/library-app/logout.php">Выход</a>
        <?php else: ?>
            <a href="/library-app/login.php">Вход</a>
            <a href="/library-app/register.php">Регистрация</a>
        <?php endif; ?>
    </nav>
</header>
<main>
