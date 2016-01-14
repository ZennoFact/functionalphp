<?php
class FileData {
    public $title;
    public $path;

    function __construct($title, $path) {
        $this->title = $title;
        $this->path = $path;
    }
}