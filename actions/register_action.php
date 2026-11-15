<?php
require_once __DIR__ . '/../config/database.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if($stmt->fetch()) {
        $_SESSION['error'] = "Пользователь с таким email уже существует";
        header('Location: /mediacare/index.php?page=register');
        exit();
    }
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    if($stmt->execute([$full_name, $email, $password])) {
        $_SESSION['success'] = "Регистрация успешна! Теперь войдите";
        header('Location: /mediacare/index.php?page=login');
    } else {
        $_SESSION['error'] = "Ошибка регистрации";
        header('Location: /mediacare/index.php?page=register');
    }
}
?>