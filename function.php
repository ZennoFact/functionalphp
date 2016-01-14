<?php
/**
 * Created by PhpStorm.
 * User: K_Maeno
 * Date: 2016/01/15
 * Time: 8:39
 */
require_once("./file_data.php");
function createFileData($file, $basePath) {
    return new FileData($file, $basePath . $file);
}
function fileOnly($file, $basePath) {
    return is_file($basePath . $file);
}
// ここのliタグの中身，関数に分離できてないけど，もう結構限界。ほかにもいい手段があるかもしれない
function createLi($li, $data) {
    $li .= "<li>" . $data->title . "=>" . $data->path . "</li>"."\n";
    return $li;
}
function natureSort($files, $order) {
    natcasesort($files);
    if ($order === "asc") {
        return $files;
    } else {
        return array_reverse($files);
    }
}
// こうしたのは，一部のファイルのみ（.phpだけ）とかにも対応するため
function readFileFromDir($basePath, callable $func) {
    $dir = opendir($basePath);
    $items = $func($dir, $basePath); //関数を外から突っ込んで実行
    closedir($dir);
    return $items;
}
function readAllFile($dir, $basePath) {
    while(false!==($items[] = readdir($dir)));
    return array_filter($items, function($item) use($basePath) { return fileOnly($item,  $basePath); }); // やってみたけど，ここまでする必要はあるのか？
}