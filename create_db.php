<?php
try {
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $pdo->exec("CREATE DATABASE IF NOT EXISTS kspm");
    echo "Database 'kspm' created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit(1);
}
