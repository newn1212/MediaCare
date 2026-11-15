<?php requireAdmin();
$pdo = getDB();
$totalTickets = $pdo->query("SELECT COUNT(*) FROM tickets")->fetchColumn();
$newTickets = $pdo->query("SELECT COUNT(*) FROM tickets WHERE status = 'Новая'")->fetchColumn();
$inWork = $pdo->query("SELECT COUNT(*) FROM tickets WHERE status = 'В работе'")->fetchColumn();
$completed = $pdo->query("SELECT COUNT(*) FROM tickets WHERE status = 'Выполнена'")->fetchColumn();
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
?>
<div class="container">
    <h2 class="section-title"><i class="fas fa-shield-alt"></i> Панель администратора</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <div style="background: #0f1222; padding: 25px; border-radius: 24px; text-align: center;"><h3 style="font-size: 2rem;"><?= $totalTickets ?></h3><p>Всего заявок</p></div>
        <div style="background: #ff9f4a20; padding: 25px; border-radius: 24px; text-align: center;"><h3 style="font-size: 2rem; color: #ff9f4a;"><?= $newTickets ?></h3><p>Новых заявок</p></div>
        <div style="background: #4a7cff20; padding: 25px; border-radius: 24px; text-align: center;"><h3 style="font-size: 2rem; color: #4a7cff;"><?= $inWork ?></h3><p>В работе</p></div>
        <div style="background: #2ecc7120; padding: 25px; border-radius: 24px; text-align: center;"><h3 style="font-size: 2rem; color: #2ecc71;"><?= $completed ?></h3><p>Выполнено</p></div>
        <div style="background: #0f1222; padding: 25px; border-radius: 24px; text-align: center;"><h3 style="font-size: 2rem;"><?= $totalUsers ?></h3><p>Пользователей</p></div>
    </div>
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        <a href="?page=admin_tickets" class="btn-primary">📋 Управление заявками</a>
        <a href="?page=admin_users" class="btn-outline-light">👥 Управление пользователями</a>
    </div>
</div>