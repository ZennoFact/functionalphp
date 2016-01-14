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
// ������li�^�O�̒��g�C�֐��ɕ����ł��ĂȂ����ǁC�������\���E�B�ق��ɂ�������i�����邩������Ȃ�
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
// ���������̂́C�ꕔ�̃t�@�C���̂݁i.php�����j�Ƃ��ɂ��Ή����邽��
function readFileFromDir($basePath, callable $func) {
    $dir = opendir($basePath);
    $items = $func($dir, $basePath); //�֐����O����˂�����Ŏ��s
    closedir($dir);
    return $items;
}
function readAllFile($dir, $basePath) {
    while(false!==($items[] = readdir($dir)));
    return array_filter($items, function($item) use($basePath) { return fileOnly($item,  $basePath); }); // ����Ă݂����ǁC�����܂ł���K�v�͂���̂��H
}