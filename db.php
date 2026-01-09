<?php
$dsn = 'mysql:host=localhost;dbname=kintaidb;charset=utf8';
$user = 'kintaiuser';
$password = 'kintaipass123';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die('接続エラー: ' . $e->getMessage());
}
?>