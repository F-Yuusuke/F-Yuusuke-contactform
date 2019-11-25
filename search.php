<?php
    require_once('function.php');
    require_once('dbconnect.php');

    $wordname = $_GET['wordname'];

    // if ($wordname == '') {
    //     $wordname = '単語が入力されていません。';
    // }else{
    //     $wordname_result = $results;
    // }


    // $wordname = '';
    // if (empty($_GET['wordname'])) {
    //     $wordname = $_GET['wordname'];
    // }
    // } いったんコメントアウトダメだったら復活させレバok
    
    
    // elseif (empty($_GET[''])) {
    //     echo '何も';
    // } これはダメでした

    // function validation($data) {
    //     $error = array();
    // if(empty($data['wordname'])) {
    //     $error[] = "入力してください。";
    //     } 
    //     return $error;
    // }


    // if (isset($nowordname['wordname'])&& $nowordname['wordname'] == 'blank
    // ') {
    //     $nowordname =('この');
    // }
    //SQLを実行
    $stmt = $dbh->prepare('SELECT * FROM surveys4 WHERE wordname = ?');
    $stmt->execute(["$wordname"]);
    $results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap_css/costome.css">
</head>
<body>
    <form action="search.php" method="get">
        <p class="text-secondary">検索したい単語を入力してください。</p>        
        <input type="text" name="wordname" value="" class="border border-info" >
        <!-- requiredこれをinputタグの一番後ろにつければ入力されていませんというのがでる -->
        <input type="submit" value="検索" class="btn btn-outline-info">
    </form>
    <!-- //画面に表示する --> 

    <?php 
    if($wordname == "") {
       $message = "<font color = 'red'>入力してください。</font>";
       echo$message;
       // 出来た！！！！
    }
    ?>

    <?php if (count($results) == 0 && strlen($wordname) > 0):?>
            <p style="color:red;">この単語は登録されていません</p>
    <?php endif; ?>
    <?php foreach ($results as $result): ?>
        <p><?php echo h($result['wordname']); ?></p>
        <p><?php echo h($result['mean']); ?></p>
        <p><?php echo h($result['about']); ?></p>
    <?php endforeach; ?>

</body>
</html>