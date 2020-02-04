<?php
require_once 'Modal/IndexModel.php';

class ResultController
{
    private $model;
    public function __construct()
    {
        $this->model = new IndexModel();
    }
    public function getAll(){
        $allData = $this->model->get();
        require_once 'View/result-view.php';
    }
}