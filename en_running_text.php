<?php

include_once './database.php';

class en_running_text {

    public $id;
    public $informasi;

    //insert data
    public function insertData() {
        $string_query = "insert into runningtext values(null,'$this->informasi',CURRENT_DATE())";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

    //insert data
    public function updateData() {
        $string_query = "update runningtext set informasi = '$this->informasi', tanggal = CURRENT_DATE() where id = $this->id";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

    //delete data
    public function deleteData() {
        $string_query = "delete from runningtext where id = $this->id";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

    //get data
    public function getData($tipe) {
        if ($tipe == "tampil") {
            $string_query = "select informasi from runningtext";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
            return $result;
        } elseif ($tipe == "tabel") {
            $string_query = "select informasi, tanggal, id from runningtext order by id desc";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
            return $result;
        }
    }

}
