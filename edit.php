<?php
    session_start();
    require 'db.php';

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }

    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM data WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $stmt = $pdo->prepare("UPDATE data SET name = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $description, $id]);
        header('Location: dashboard.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edir Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data</h1>
    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
        <textarea name="description" required><?= htmlspecialchars($row['description'])?></textarea>
        <button type"submit>Update</button>
    </form>
</body>
</html>