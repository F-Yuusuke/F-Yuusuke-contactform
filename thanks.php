<?php
    require_once('function.php');
    require_once('dbconnect.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Location: index.html');
    }
    $wordname = $_POST['wordname'];
    $mean = $_POST['mean'];
    $about = $_POST['about'];

    $stmt = $dbh->prepare('INSERT INTO surveys4 (wordname, mean, about) VALUES (?, ?, ?)');
    $stmt->execute([$wordname, $mean, $about]);//?を変数に置き換えてSQLを実行
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>ご協力ありがとうございました！</h1>
    <p><?php echo $wordname; ?></p>
    <p><?php echo $mean; ?></p>
    <p><?php echo $about; ?></p>
</body>
</html>