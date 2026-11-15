<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/auth.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$publicPages = ['home', 'services', 'login', 'register'];
$userPages = ['new_ticket', 'my_tickets'];
$adminPages = ['admin_dashboard', 'admin_users', 'admin_tickets'];

if (in_array($page, $userPages) && !isLoggedIn()) {
    $page = 'login';
}

if (in_array($page, $adminPages) && !isAdmin()) {
    $page = 'home';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediaCare — Учёт заявок на ТО мультимедийного оборудования</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/mediacare/css/style.css">
</head>
<body>
<div class="navbar">
    <div class="container nav-inner">
        <div class="logo">
            <i class="fas fa-microphone-alt"></i> MediaCare
        </div>
        <div class="nav-links">
            <a href="?page=home" class="<?= $page == 'home' ? 'active' : '' ?>">Главная</a>
            <a href="?page=services" class="<?= $page == 'services' ? 'active' : '' ?>">Услуги</a>
            <?php if (isLoggedIn()): ?>
                <a href="?page=my_tickets" class="<?= $page == 'my_tickets' ? 'active' : '' ?>">Мои заявки</a>
                <a href="?page=new_ticket" class="<?= $page == 'new_ticket' ? 'active' : '' ?>">+ Новая заявка</a>
                <?php if (isAdmin()): ?>
                    <a href="?page=admin_dashboard" class="<?= $page == 'admin_dashboard' ? 'active' : '' ?>">
                        <i class="fas fa-shield-alt"></i> Админ-панель
                    </a>
                <?php endif; ?>
                <div class="user-info">
                    <span><i class="fas fa-user"></i> <?= htmlspecialchars($_SESSION['user_name']) ?></span>
                    <a href="/mediacare/actions/logout.php" class="logout-link">Выход</a>
                </div>
            <?php else: ?>
                <a href="?page=login" class="btn-outline-light">Вход</a>
                <a href="?page=register" class="btn-primary">Регистрация</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<main>
    <?php
    switch($page) {
        case 'home': include 'pages/home.php'; break;
        case 'services': include 'pages/services.php'; break;
        case 'login': include 'pages/login.php'; break;
        case 'register': include 'pages/register.php'; break;
        case 'new_ticket': include 'pages/new_ticket.php'; break;
        case 'my_tickets': include 'pages/my_tickets.php'; break;
        case 'admin_dashboard': include 'pages/admin/dashboard.php'; break;
        case 'admin_users': include 'pages/admin/users.php'; break;
        case 'admin_tickets': include 'pages/admin/tickets.php'; break;
        default: include 'pages/home.php';
    }
    ?>
</main>

<footer>
    <div class="container">
        <p>© 2026 MediaCare — Система учёта заявок на ТО мультимедийного оборудования</p>
    </div>
</footer>
</body>
</html>