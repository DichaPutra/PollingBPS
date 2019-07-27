<?php

include_once './database.php';

class en_background {

    public $id;
    public $nama;
    public $path;
    public $kategori;
    public $stats;

    //insert data
    public function insertData() {
        $string_query = "insert into background values(null,'$this->nama','$this->path','$this->kategori','$this->stats')";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

    //update data
    public function updateData($tipe) {
        if ($tipe == "all") {
            $string_query = "update background set stats = 'tidak aktif'";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        } elseif ($tipe == "aktif") {
            $string_query = "update background set stats = 'aktif' where id = $this->id";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        }
    }

    //delete data
    public function deleteData($tipe) {
        if ($tipe == "user upload") {
            $string_query = "delete from background where kategori = 'user upload'";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        }
    }

    //get data
    public function getData($tipe) {
        if ($tipe == "tampil") {
            $string_query = "select path from background where stats = 'aktif'";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
            return $result;
        } elseif ($tipe == "semua") {
            $string_query = "select id, nama, path, stats from background";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
            return $result;
        } elseif ($tipe == "aktif") {
            $string_query = "select id, nama, path, stats from background where stats = 'aktif'";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
            return $result;
        } elseif ($tipe == "dashboard") {
            $string_query = "select nama, path from background";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
            return $result;
        } elseif ($tipe == "user upload") {
            $string_query = "select path from background where kategori = 'user upload'";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
            return $result;
        }
    }

}
