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
    // 退勤：最新のデータに時刻を入れる
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤怠入力システム</title>
    <style>
        body { font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.1); width: 100%; max-width: 400px; text-align: center; }
        h1 { color: #1a73e8; margin-bottom: 24px; }
        input[type="number"] { width: 80%; padding: 12px; margin-bottom: 24px; border: 2px solid #ddd; border-radius: 8px; font-size: 18px; outline: none; transition: border-color 0.3s; }
        input[type="number"]:focus { border-color: #1a73e8; }
        .btn-group { display: flex; gap: 16px; justify-content: center; }
        button { flex: 1; padding: 14px; font-size: 16px; font-weight: bold; border: none; border-radius: 8px; cursor: pointer; transition: opacity 0.2s; }
        .btn-start { background-color: #34a853; color: white; }
        .btn-end { background-color: #ea4335; color: white; }
        button:hover { opacity: 0.8; }
        .footer-link { display: block; margin-top: 24px; color: #5f6368; text-decoration: none; font-size: 14px; }
        .footer-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="card">
    <h1>勤怠入力</h1>
    <form action="post.php" method="POST">
        <input type="number" name="jugyoin_id" placeholder="従業員IDを入力" required>
        <div class="btn-group">
            <button type="submit" name="action" value="start" class="btn-start">出勤</button>
            <button type="submit" name="action" value="end" class="btn-end">退勤</button>
        </div>
    </form>
    <a href="list.php" class="footer-link">勤務履歴一覧を表示</a>
</div>

</body>
</html>