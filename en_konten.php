<?php

include_once './database.php';

class en_konten {

    public $idkonten;
    public $type;
    public $text;

    //insert data
    public function insertData() {
        $string_query = "insert into konten values(null,'$this->type','$this->polling')";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

    //get data
    public function getData() {
        $string_query = "select type, text from konten where type = '$this->type'";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
        return $result;
    }

    public function getLokasi() {
        $string_query = "select text from konten where type = 'lokasi'";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
        return $result;
    }

    //update data
    public function updateData() {
        $string_query = "update konten set text = '$this->text' where type = '$this->type'";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

}
