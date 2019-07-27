<?php

//open all lib that need for running this logic
require_once './en_polling.php';
require_once './en_rekap.php';
require_once './en_running_text.php';
require_once './en_background.php';
require_once './en_konten.php';

//listen what the client behavior send to this handler
if (isset($_POST['sign_key'])) {
    //listen what visitor action gave to system to compute
    $pengunjung = new cn_pengunjung();
    $result = $_POST['sign_key'];
    $pengunjung->result = $result;
    $pengunjung->tambahPolling();
    $pengunjung->rekapPolling();
    $pengunjung->tampilRekapPolling();
}
//display visitor interface when there is no specific need
else {
    $pengunjung = new cn_pengunjung();
    $pengunjung->tampilRekapPolling();
}

class cn_pengunjung {

    public $en_polling;
    public $en_rekap;
    public $en_running_text;
    public $en_background;
    public $en_konten;
    public $result;

    function __construct() {
        $this->en_polling = new en_polling();
        $this->en_rekap = new en_rekap();
        $this->en_running_text = new en_running_text();
        $this->en_background = new en_background();
        $this->en_konten = new en_konten();
    }

    //adding new polling record
    function tambahPolling() {
        if ($this->result == '0') {
            //pengisian tabel polling
            $this->en_polling->polling = 'tidak puas';
            $this->en_polling->insertData();
        } elseif ($this->result == '1') {
            //pengisian tabel polling
            $this->en_polling->polling = 'puas';
            $this->en_polling->insertData();
        } elseif ($this->result == '2') {
            //pengisian tabel polling
            $this->en_polling->polling = 'sangat puas';
            $this->en_polling->insertData();
        }
    }

    //adding new poling summary
    function rekapPolling() {
        if ($this->result == '0') {
            // pengisian tabel rekap
            $this->en_rekap->tanggal = date("j");
            $this->en_rekap->bulan = date("n");
            $this->en_rekap->tahun = date("Y");

            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('0');
            } else {
                $get = $this->en_rekap->getData("tidakpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("0", $numnow);
            }
        } elseif ($this->result == '1') {
            // pengisian tabel rekap
            $this->en_rekap->tanggal = date("j");
            $this->en_rekap->bulan = date("n");
            $this->en_rekap->tahun = date("Y");

            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('1');
            } else {
                $get = $this->en_rekap->getData("puas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("1", $numnow);
            }
        } elseif ($this->result == '2') {
            // pengisian tabel rekap
            $this->en_rekap->tanggal = date("j");
            $this->en_rekap->bulan = date("n");
            $this->en_rekap->tahun = date("Y");

            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('2');
            } else {
                $get = $this->en_rekap->getData("sangatpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("2", $numnow);
            }
        }
    }

    //display polling summary interface that day
    function tampilRekapPolling() {
        $this->en_rekap->tanggal = date("j");
        $this->en_rekap->bulan = date("n");
        $this->en_rekap->tahun = date("Y");

        $dr_hari = $this->en_rekap->getData("harian_1");
        if (mysqli_num_rows($dr_hari) == 0) {
            $dj_hari[0] = $dj_hari[1] = $dj_hari[2] = $persen_tp_hari = $persen_p_hari = $persen_sp_hari = 0;
            $dj_hari[3] = $dj_hari[0] + $dj_hari[1] + $dj_hari[2];
        } else {
            $dj_hari = mysqli_fetch_array($dr_hari);
            if (($dj_hari[0] + $dj_hari[1] + $dj_hari[2]) == 0) {
                $persen_tp_hari = $persen_p_hari = $persen_sp_hari = 0;
            } else {
                $persen_tp_hari = ($dj_hari[0] / ($dj_hari[0] + $dj_hari[1] + $dj_hari[2])) * 100;
                $persen_p_hari = ($dj_hari[1] / ($dj_hari[0] + $dj_hari[1] + $dj_hari[2])) * 100;
                $persen_sp_hari = ($dj_hari[2] / ($dj_hari[0] + $dj_hari[1] + $dj_hari[2])) * 100;
            }
        }
        $total_harian = $dj_hari[3];


        $dr_bulan = $this->en_rekap->getData("bulanan_1");
        if (mysqli_num_rows($dr_bulan) == 0) {
            $dj_bulan[0] = $dj_bulan[1] = $dj_bulan[2] = $persen_tp_bulan = $persen_p_bulan = $persen_sp_bulan = 0;
            $dj_bulan[3] = $dj_bulan[0] + $dj_bulan[1] + $dj_bulan[2];
        } else {
            $dj_bulan = mysqli_fetch_array($dr_bulan);
            if (($dj_bulan[0] + $dj_bulan[1] + $dj_bulan[2]) == 0) {
                $persen_tp_bulan = $persen_p_bulan = $persen_sp_bulan = 0;
            } else {
                $persen_tp_bulan = ($dj_bulan[0] / ($dj_bulan[0] + $dj_bulan[1] + $dj_bulan[2])) * 100;
                $persen_p_bulan = ($dj_bulan[1] / ($dj_bulan[0] + $dj_bulan[1] + $dj_bulan[2])) * 100;
                $persen_sp_bulan = ($dj_bulan[2] / ($dj_bulan[0] + $dj_bulan[1] + $dj_bulan[2])) * 100;
            }
        }
        $total_bulanan = $dj_bulan[3];


        $dr_tahun = $this->en_rekap->getData("tahunan_1");
        $djc_tahun[3] = 0;
        if (mysqli_num_rows($dr_tahun) == 0) {
            for ($i = 1; $i <= 12; $i++) {
                $dj_tahun[$i][0] = $dj_tahun[$i][1] = $dj_tahun[$i][2] = $persen_tp_tahun[$i] = $persen_p_tahun[$i] = $persen_sp_tahun[$i] = 0;
                $djc_tahun[3] += $dj_tahun[$i][0] + $dj_tahun[$i][1] + $dj_tahun[$i][2];
            }
        } else {
            $dj_tahun = mysqli_fetch_array($dr_tahun);
            for ($i = 1; $i <= 12; $i++) {
                if ($dj_tahun[4] == $i) {
                    $persen_tp_tahun[$i] = ($dj_tahun[0] / ($dj_tahun[0] + $dj_tahun[1] + $dj_tahun[2])) * 100;
                    $persen_p_tahun[$i] = ($dj_tahun[1] / ($dj_tahun[0] + $dj_tahun[1] + $dj_tahun[2])) * 100;
                    $persen_sp_tahun[$i] = ($dj_tahun[2] / ($dj_tahun[0] + $dj_tahun[1] + $dj_tahun[2])) * 100;
                    $djc_tahun[3] += $dj_tahun[3];
                    $dj_tahun = mysqli_fetch_array($dr_tahun);
                } else {
                    $persen_tp_tahun[$i] = 0;
                    $persen_p_tahun[$i] = 0;
                    $persen_sp_tahun[$i] = 0;
                    $djc_tahun[3] += 0;
                }
            }
        }
        $total_tahunan = $djc_tahun[3];


        $datarunningtext = $this->en_running_text->getData("tampil");
        $datarunningtextrow = mysqli_num_rows($datarunningtext);

        $databackground = $this->en_background->getData("tampil");
        $databackgroundrow = mysqli_num_rows($databackground);

        $this->en_konten->type = 'lokasi';
        $datakonten_lokasi_result = $this->en_konten->getData();
        $datakonten_lokasi = mysqli_fetch_array($datakonten_lokasi_result);
        $datakonten_lokasi_jadi = $datakonten_lokasi[1];

        $this->en_konten->type = 'judul';
        $datakonten_judul_result = $this->en_konten->getData();
        $datakonten_judul = mysqli_fetch_array($datakonten_judul_result);
        $datakonten_judul_jadi = $datakonten_judul[1];

        $this->en_konten->type = 'subjudul';
        $datakonten_subjudul_result = $this->en_konten->getData();
        $datakonten_subjudul = mysqli_fetch_array($datakonten_subjudul_result);
        $datakonten_subjudul_jadi = $datakonten_subjudul[1];

        $this->en_konten->type = 'indikator';
        $datakonten_indikator_result = $this->en_konten->getData();
        $datakonten_indikator = mysqli_fetch_array($datakonten_indikator_result);
        $datakonten_indikator_jadi = $datakonten_indikator[1];

        include_once 'bn_polling.php';
    }

}
