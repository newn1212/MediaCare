<?php requireAdmin();
$pdo = getDB();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_ticket'])) {
    $stmt = $pdo->prepare("UPDATE tickets SET status = ?, admin_comment = ? WHERE id = ?");
    $stmt->execute([$_POST['status'], $_POST['admin_comment'], $_POST['ticket_id']]);
    header("Location: ?page=admin_tickets");
    exit();
}
$tickets = $pdo->query("SELECT t.*, u.full_name, u.email FROM tickets t JOIN users u ON t.user_id = u.id ORDER BY CASE t.status WHEN 'Новая' THEN 1 WHEN 'В работе' THEN 2 ELSE 3 END, t.created_at DESC")->fetchAll();
?>
<div class="container">
    <h2 class="section-title">📋 Управление заявками</h2>
    <div class="admin-table">
        <table>
            <thead><tr><th>ID</th><th>Пользователь</th><th>Оборудование</th><th>Описание</th><th>Статус</th><th>Действия</th></tr></thead>
            <tbody>
                <?php foreach($tickets as $ticket): ?>
                <tr>
                    <td><?= $ticket['id'] ?></td>
                    <td><?= htmlspecialchars($ticket['full_name']) ?><br><small><?= $ticket['email'] ?></small></td>
                    <td><?= htmlspecialchars($ticket['equipment_type']) ?><br><?= htmlspecialchars($ticket['equipment']) ?></td>
                    <td><?= mb_substr($ticket['description'], 0, 60) ?>...</td>
                    <td><span class="badge"><?= $ticket['status'] ?></span></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="ticket_id" value="<?= $ticket['id'] ?>">
                            <select name="status">
                                <option value="Новая" <?= $ticket['status'] == 'Новая' ? 'selected' : '' ?>>Новая</option>
                                <option value="В работе" <?= $ticket['status'] == 'В работе' ? 'selected' : '' ?>>В работе</option>
                                <option value="Выполнена" <?= $ticket['status'] == 'Выполнена' ? 'selected' : '' ?>>Выполнена</option>
                                <option value="Отклонена" <?= $ticket['status'] == 'Отклонена' ? 'selected' : '' ?>>Отклонена</option>
                            </select>
                            <input type="text" name="admin_comment" placeholder="Комментарий" style="width:150px;">
                            <button type="submit" name="update_ticket" class="btn-sm btn-primary">Обновить</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>