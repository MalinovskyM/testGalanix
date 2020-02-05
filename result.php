<?php
require_once 'Controllers/ResultController.php';
require_once 'Helper.php';

$index = new ResultController();
if (isset($_POST["clearAll"])){
    $index->clearAll();
}else{
    $index->getAll();
}


