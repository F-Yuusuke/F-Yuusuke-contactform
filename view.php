<?php
    require_once('function.php');
    require_once('dbconnect.php');

    //SQLを実行
    $stmt = $dbh->prepare('SELECT * FROM surveys4');
    $stmt->execute();
    $results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>一覧</title>
</head>
<body>
<!-- //画面に表示する -->
    <?php foreach ($results as $result): ?>
        <p><?php echo h($result['wordname']); ?></p>
        <p><?php echo h($result['mean']); ?></p>
        <p><?php echo h($result['about']); ?></p>
    <?php endforeach; ?>
</body>
</html>