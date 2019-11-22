<?php
    require_once('function.php');
    require_once('dbconnect.php');

    $wordname = '';
    if (isset($_GET['wordname'])) {
        $wordname = $_GET['wordname'];
    }

    //SQLを実行
    $stmt = $dbh->prepare('SELECT * FROM surveys4 WHERE wordname like ?');
    $stmt->execute(["%$wordname%"]);
    $results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
</head>
<body>
    <!-- <form action="" method="get">
        <p>検索したい単語を入力してください。</p>
        <input type="text" name="wordname">
        <input type="submit" value="検索">
    </form> -->
    <!-- //画面に表示する -->
    <?php foreach ($results as $result): ?>
        <p><?php echo h($result['wordname']); ?></p>
        <p><?php echo h($result['mean']); ?></p>
        <p><?php echo h($result['about']); ?></p>
    <?php endforeach; ?>
</body>
</html>