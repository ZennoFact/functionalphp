<?php
require_once("./function.php");
$order = "";
$fileView = "ソート方法を選択してください。";
if (isset($_POST["sort_type"]) && !empty($_POST["sort_type"])) {
    $order = htmlspecialchars(@$_POST["sort_type"]);
    $basePath = "./files/";
    $_items = readFileFromDir($basePath, "readAllFile");
    $items = natureSort($_items, $order);

    // 整頓ついでに引数を複数飛ばすためにラムダ式導入　しかし，可読性は下がった気がする。
    $fileView = "<ul>"."\n";
    $fileView .= array_reduce( array_map(function($item) use($basePath) { return createFileData($item, $basePath); }, $items), "createLi" );
    $fileView .= "</ul>"."\n";
}


require_once("./view.php");

