<?php requireAdmin();
$pdo = getDB();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_role'])) {
    $stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->execute([$_POST['role'], $_POST['user_id']]);
    header("Location: ?page=admin_users");
    exit();
}
if(isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: ?page=admin_users");
    exit();
}
$users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();
?>
<div class="container">
    <h2 class="section-title">👥 Управление пользователями</h2>
    <div class="admin-table">
        <table>
            <thead><tr><th>ID</th><th>ФИО</th><th>Email</th><th>Роль</th><th>Дата регистрации</th><th>Действия</th></tr></thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['full_name']) ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <form method="POST" style="display:inline">
                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                            <select name="role">
                                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>Пользователь</option>
                                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Администратор</option>
                            </select>
                            <button type="submit" name="change_role" class="btn-sm btn-primary">Изменить</button>
                        </form>
                    </td>
                    <td><?= date('d.m.Y', strtotime($user['created_at'])) ?></td>
                    <td><?php if($user['id'] != $_SESSION['user_id']): ?><a href="?page=admin_users&delete=<?= $user['id'] ?>" onclick="return confirm('Удалить пользователя?')" style="color:#ff9191;">Удалить</a><?php endif; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>