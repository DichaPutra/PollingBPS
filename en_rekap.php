<?php

include_once './database.php';

class en_rekap {

    public $tanggal;
    public $bulan;
    public $tahun;
    public $tidakpuas;
    public $puas;
    public $sangatpuas;

    //insert data
    public function insertData($tipe) {
        if ($tipe == '0') {
            $string_query = "insert into rekap values('$this->tanggal','$this->bulan','$this->tahun',1,0,0)";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        } elseif ($tipe == '1') {
            $string_query = "insert into rekap values('$this->tanggal','$this->bulan','$this->tahun',0,1,0)";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        } elseif ($tipe == '2') {
            $string_query = "insert into rekap values('$this->tanggal','$this->bulan','$this->tahun',0,0,1)";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        }
    }

    //update data
    public function updateData($tipe, $num) {
        if ($tipe == "0") {
            $string_query = "update rekap set tidakpuas = $num where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        } elseif ($tipe == "1") {
            $string_query = "update rekap set puas = $num where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        } elseif ($tipe == "2") {
            $string_query = "update rekap set sangatpuas = $num where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun";
            $result = mysqli_query($GLOBALS['conn'],$string_query);
        }
    }

    //delete data
    public function deleteData() {
        $string_query = "delete from rekap where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun";
        $result = mysqli_query($GLOBALS['conn'],$string_query);
    }

    //get data
    public function getData($tipe) {
        switch ($tipe) {
            case "cek" :
                $string_query = "select * from rekap where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun";
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                $numrow = mysqli_num_rows($result);
                return $numrow;
                break;
            case "tidakpuas" :
                $string_query = "select tidakpuas from rekap where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "puas":
                $string_query = "select puas from rekap where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "sangatpuas" :
                $string_query = "select sangatpuas from rekap where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "rekap" :
                $string_query = "select tidakpuas, puas, sangatpuas from rekap where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "tahunan" :
                $string_query = "select bulan, sum(tidakpuas), sum(puas), sum(sangatpuas) from rekap where tahun = $this->tahun group by bulan"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "tahunexist" :
                $string_query = "select tahun from rekap group by tahun"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "bulanan" :
                $string_query = "select tanggal, bulan, tahun, tidakpuas, puas, sangatpuas from rekap where bulan = $this->bulan and tahun = $this->tahun"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "harian_1" :
                $string_query = "select tidakpuas, puas, sangatpuas, sum(tidakpuas) + sum(puas) + sum(sangatpuas) as all_record from rekap where tanggal = $this->tanggal and bulan = $this->bulan and tahun = $this->tahun"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "bulanan_1" :
                $string_query = "select sum(tidakpuas) as tp, sum(puas) as p, sum(sangatpuas) as sp, sum(tidakpuas) + sum(puas) + sum(sangatpuas) as all_record from rekap where bulan = $this->bulan and tahun = $this->tahun"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            case "tahunan_1" :
                $string_query = "select sum(tidakpuas) as tp, sum(puas) as p, sum(sangatpuas) as sp, sum(tidakpuas) + sum(puas) + sum(sangatpuas) as all_record, bulan from rekap where tahun = $this->tahun group by bulan order by bulan"; //itung jumlah tidak puas where tanggal sekarang
                $result = mysqli_query($GLOBALS['conn'],$string_query);
                return $result;
                break;
            default:
                break;
        }
    }

}
