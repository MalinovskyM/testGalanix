<?php
require_once 'Models/IndexModel.php';

class ResultController
{
    private $model;
    public function __construct()
    {
        $this->model = new IndexModel();
    }
    public function getAll(){
        $allData = $this->model->get();
        require_once 'Views/result-view.php';
    }

    public function clearAll(){
        $this->model->clearAll();
        require_once 'Views/result-view.php';
    }
}