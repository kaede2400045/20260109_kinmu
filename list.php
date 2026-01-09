<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>勤務一覧</title>
    <style>
        body { background-color: #fffaf0; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; background: white; }
        th { background: #ed8936; color: white; padding: 10px; border: 1px solid #ddd; }
        td { border: 1px solid #ddd; padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2 style="text-align: center; color: #ed8936;">勤務記録一覧</h2>
    <table>
        <tr><th>従業員ID</th><th>出勤時刻</th><th>退勤時刻</th></tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM kiroku ORDER BY id DESC");
        while($row = $stmt->fetch()) {
            echo "<tr><td>{$row['jugyoin_id']}</td><td>{$row['start_work']}</td><td>{$row['end_work']}</td></tr>";
        }
        ?>
    </table>
    <div style="text-align:center;"><a href="index.php">出勤画面へ戻る</a></div>
</body>
</html>
