<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>出勤</title>
    <style>
        body { background-color: #e6fffa; text-align: center; font-family: sans-serif; }
        .box { background: white; border: 3px solid #38a169; padding: 20px; display: inline-block; margin-top: 50px; border-radius: 10px; }
        button { background: #38a169; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2 style="color: #2f855a;">おはようございます</h2>
        <form action="process.php" method="POST">
            従業員ID: <input type="number" name="jugyoin_id" required><br><br>
            <input type="hidden" name="action" value="start">
            <button type="submit">出勤ボタンを押す</button>
        </form>
        <p><a href="finish_form.php" style="color:#3182ce;">退勤はこちら</a></p>
    </div>
</body>
</html>