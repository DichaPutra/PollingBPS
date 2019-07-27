<?php

include_once './database.php';

class en_polling {

    public $idpolling;
    public $waktu;
    public $polling;
    public $id_dmy;

    //insert data
    public function insertData() {
        $string_query = "insert into polling values(NULL, CURRENT_TIMESTAMP, '$this->polling')";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

    public function insertDataMDP() {
        $string_query = "insert into polling values(NULL, '$this->waktu', '$this->polling')";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

    public function getData() {
        $string_query = "select idpolling, waktu, polling from polling where waktu like '$this->id_dmy%' order by idpolling";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
        return $result;
    }

    public function updateData() {
        $string_query = "update polling set polling = '$this->polling', waktu = '$this->waktu' where idpolling = '$this->idpolling'";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }
    
    public function deleteData() {
        $string_query = "delete from polling where idpolling = '$this->idpolling'";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

}
