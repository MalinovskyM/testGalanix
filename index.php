<?php
require_once 'Controller/IndexController.php';
require_once 'Healper.php';

$index = new IndexController();

if (isset($_FILES["data"])){
    $index->newFile();
}else{
    $index->home();
}
