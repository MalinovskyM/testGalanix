<?php


class IndexModel
{
    public function get(){

        $sql = "SELECT * FROM `test`";
        $result = mysqli_query(linksql(),$sql);
        return $result;
    }

    public function parsingCsv($uploadfile){
        $result = [];
        if (move_uploaded_file($_FILES['data']['tmp_name'], $uploadfile)) {
            $file = fopen($uploadfile, 'r');
            while (($line = fgetcsv($file)) !== FALSE) {
                array_push($result,$line);
            }
            fclose($file);
        }
        else{
            echo "Возможная атака с помощью файловой загрузки!\n";
            echo 'Некоторая отладочная информация:';
            print_r($_FILES);
            print "</pre>";
        }
        return $result;
    }

    public function cheakCsv($arr){
        $etalon = ["UID","Name","Age","Email","Phone","Gender"];
        $diff = array_diff($arr, $etalon);
        if (count($diff)>0){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    public function addDB($arr){
        foreach ($arr as $k => $v){
            if($k!==0) {
                $this->checkUID($v[0], $v);
            }
        }
        return true;
    }

    private function checkUID($uid,$arr){
        $sql = "SELECT `id` FROM `test` WHERE `UID` = '$uid'";
        $res = mysqli_query(linksql(),$sql);
        $count = mysqli_num_rows($res);
        if ($count>0){
            foreach ($res as $v){ $id = $v['id']; }
            $this->update($id,$arr);
        }else{
            $this->insert($arr);
        }
        return true;
    }

    private function update($id,$arr){
        $sql = "UPDATE `test` SET `UID`='".$arr[0]."',`Name`='".$arr[1]."',`Age`='".$arr[2]."',`Email`='".$arr[3]."',`Phone`='".$arr[4]."',`Gender`='".$arr[5]."' WHERE `id`='$id'";
        $res = mysqli_query(linksql(),$sql);
        return true;
    }

    private function insert($arr){
        $sql = "INSERT INTO `test`(`UID`, `Name`, `Age`, `Email`, `Phone`, `Gender`) VALUES ('".$arr[0]."','".$arr[1]."','".$arr[2]."','".$arr[3]."','".$arr[4]."','".$arr[5]."')";
        $req = mysqli_query(linksql(),$sql);
        return true;
    }

    public function clearAll(){
        $sql = "DELETE FROM `test`";
        $req = mysqli_query(linksql(),$sql);
        return true;
    }

}