<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>sort_sample</title>
</head>
<body>
<form method="post" action="./">
    <SELECT name="sort_type">
        <OPTION value="" <?= $order === "" ? "selected": "" ?>>ソート</OPTION>
        <OPTION value="asc" <?= $order === "asc" ? "selected": "" ?>>昇順</OPTION>
        <OPTION value="desc"<?= $order === "desc" ? "selected": "" ?>>降順</OPTION>
    </SELECT>
    <input type="submit" value="送信">
</form>
<div id="result-list">
    <?php echo($fileView) ?>
</div>
</body>

</html>