<?php
include('db.php');
$id = $_POST['jugyoin_id'];
$action = $_POST['action'];

if ($action === 'start') {
    // 出勤：新しくレコードを作る
    $sql = "INSERT INTO kiroku (jugyoin_id, start_work) VALUES (?, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
} elseif ($action === 'end') {
    // 退勤：その従業員の最新の（退勤が空の）データに時刻を入れる
    $sql = "UPDATE kiroku SET end_work = NOW() WHERE jugyoin_id = ? AND end_work IS NULL ORDER BY id DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

header('Location: list.php'); // 処理が終わったら一覧へ
?>