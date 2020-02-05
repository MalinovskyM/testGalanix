<?php
require_once 'Controllers/IndexController.php';
require_once 'Helper.php';

$index = new IndexController();
if (isset($_FILES["data"])){
    $index->newFile();
}else{
    $index->home();
}
