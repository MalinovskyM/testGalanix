<?php
require_once 'Models/IndexModel.php';

class IndexController
{
    private $model;
    public function __construct()
    {
        $this->model = new IndexModel();
    }

    public function home(){
        require_once 'Views/index-view.php';
    }

    public function  newFile(){
        $uploadfile = 'files/'.$_FILES['data']['name'];
        $result = $this->model->parsingCsv($uploadfile);
        $cheak = $this->model->cheakCsv($result[0]);
        if($cheak){
            $testSql = $this->model->addDB($result);
            $allData = $this->model->get();
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            $headel_link= "Location: ".$actual_link."/result.php";
            header($headel_link);
        }else{
            require_once 'Views/error-view.php';
        }
    }

}