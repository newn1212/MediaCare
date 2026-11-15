<?php requireLogin();
$pdo = getDB();
$stmt = $pdo->prepare("SELECT * FROM tickets WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$tickets = $stmt->fetchAll();
?>
<div class="container">
    <h2 class="section-title">📋 Мои заявки</h2>
    <?php if(count($tickets) === 0): ?>
        <div class="ticket-container" style="text-align:center">
            <p>У вас пока нет заявок</p>
            <a href="?page=new_ticket" class="btn-primary">Создать первую заявку</a>
        </div>
    <?php else: ?>
        <div class="ticket-list">
            <?php foreach($tickets as $ticket): ?>
            <div class="ticket-item">
                <div style="display: flex; justify-content: space-between; flex-wrap:wrap;">
                    <strong>🛠 <?= htmlspecialchars($ticket['equipment_type']) ?> — <?= htmlspecialchars($ticket['equipment']) ?></strong>
                    <span class="badge"><?= $ticket['status'] ?></span>
                </div>
                <div style="margin: 12px 0;">📄 <?= nl2br(htmlspecialchars($ticket['description'])) ?></div>
                <?php if($ticket['admin_comment']): ?>
                    <div style="background: #1e2340; padding: 10px; border-radius: 12px; margin: 10px 0;">
                        <i class="fas fa-comment"></i> Комментарий: <?= htmlspecialchars($ticket['admin_comment']) ?>
                    </div>
                <?php endif; ?>
                <div style="font-size: 0.8rem; opacity:0.7;">
                    Приоритет: <?= $ticket['priority'] ?> | Создано: <?= date('d.m.Y H:i', strtotime($ticket['created_at'])) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>