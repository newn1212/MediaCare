<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/auth.php';
requireLogin();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = getDB();
    $stmt = $pdo->prepare("INSERT INTO tickets (user_id, equipment_type, equipment, description, priority) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $_POST['equipment_type'], $_POST['equipment'], $_POST['description'], $_POST['priority']]);
    $_SESSION['success'] = "Заявка успешно создана!";
    header('Location: /mediacare/index.php?page=my_tickets');
    exit();
}
?>