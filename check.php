<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Location: index.html');
    }
    // $wordname = $_POST['wordname'];
    // echo $wordname;
    // echo"<br>";
    // $mean = $_POST['mean'];
    // echo $mean;
    // echo"<br>";
    // $about = $_POST['about'];
    // echo $about;
    // echo"<br>";

    $wordname = $_POST['wordname'];
    $mean = $_POST['mean'];
    $about = $_POST['about'];

    if ($wordname == '') {
        $wordname_result = '単語が入力されていません。';
    } else {
        $wordname_result = $wordname.'を登録します';
    }

    if ($mean == '') {
        $mean_result = '意味が入力されていません。';
    } else {
        $mean_result = '意味は、'.$mean.'です。';
    }

    if ($about == '') {
        $about_result = '一言でまとめるとが入力されていません。';
    } else {
        $about_result = '一言でまとめると、'.$about.'です。';
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>入力内容確認</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>入力内容確認</h1>
    <p><?php echo $wordname_result; ?></p>
    <p><?php echo $mean_result; ?></p>
    <p><?php echo $about_result; ?></p>
    <form method="POST" action="thanks.php">
    <input type="hidden" name="wordname" value="<?php echo $wordname; ?>">
    <input type="hidden" name="mean" value="<?php echo $mean; ?>">
    <input type="hidden" name="about" value="<?php echo $about; ?>">
      <input type="button" value="戻る" onclick="history.back()">
      <?php if ($wordname != '' && $mean != '' && $about != ''):?>
        <input type="submit" value="OK">
      <?php endif; ?>
    </form>
</body>
</html>