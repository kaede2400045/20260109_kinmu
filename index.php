<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>勤怠管理システム</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; background-color: #f4f7f6; }
        .container { background: white; border: 1px solid #ddd; padding: 30px; display: inline-block; border-radius: 15px; shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        input { padding: 12px; font-size: 16px; margin-bottom: 20px; width: 200px; border: 1px solid #ccc; border-radius: 5px; }
        .btn-group { display: flex; justify-content: center; gap: 10px; }
        button { padding: 12px 24px; font-size: 16px; cursor: pointer; border: none; border-radius: 5px; transition: 0.3s; }
        .start { background-color: #28a745; color: white; }
        .start:hover { background-color: #218838; }
        .end { background-color: #dc3545; color: white; }
        .end:hover { background-color: #c82333; }
        .link { margin-top: 20px; display: block; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <h1>勤怠入力</h1>
    <form action="post.php" method="POST">
        <p>従業員IDを入力</p>
        <input type="number" name="jugyoin_id" required placeholder="例: 123">
        <div class="btn-group">
            <button type="submit" name="action" value="start" class="start">出勤</button>
            <button type="submit" name="action" value="end" class="end">退勤</button>
        </div>
    </form>
    <a href="list.php" class="link">履歴一覧を見る</a>
</div>

</body>
</html>