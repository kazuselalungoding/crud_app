<?php
    session_start();
    require 'db.php';

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }

    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM data WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: dashboard.php');
    exit;
?>