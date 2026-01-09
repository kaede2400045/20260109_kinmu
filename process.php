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

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>勤怠管理システム</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        .container { border: 1px solid #ccc; padding: 20px; display: inline-block; border-radius: 10px; }
        input { padding: 10px; font-size: 16px; margin-bottom: 20px; }
        button { padding: 10px 20px; font-size: 16px; cursor: pointer; margin: 5px; }
        .start { background-color: #4CAF50; color: white; border: none; }
        .end { background-color: #f44336; color: white; border: none; }
    </style>
</head>
<body>

<div class="container">
    <h1>勤怠入力</h1>
    <form action="post.php" method="POST">
        <p>従業員IDを入力してください</p>
        <input type="number" name="jugyoin_id" required placeholder="例: 1">
        <br>
        <button type="submit" name="action" value="start" class="start">出勤</button>
        <button type="submit" name="action" value="end" class="end">退勤</button>
    </form>
    <br>
    <a href="list.php">履歴一覧を見る</a>
</div>

</body>
</html>