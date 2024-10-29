<?php
    $host = 'localhost';
    $dbname = 'crud_app';
    $username = 'root';
    $password = '';

    try {  
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connect sukses";
    } catch (PDOException $e) {
        echo "Connect Failed". $e->getMessage();
    }
?>