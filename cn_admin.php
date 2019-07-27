<?php

//open all lib that need for running this logic
require_once './en_polling.php';
require_once './en_rekap.php';
require_once './en_running_text.php';
require_once './en_background.php';
require_once './en_konten.php';
require_once './library/php-export-data.class.php';

//listen what the client behavior send to this handler
if (!empty($_GET['id'])) {
    //listen what the client want to go
    $admin = new cn_admin();
    switch ($_GET['id']) {
        case "dashboard":
            //open dashboard interface for manipulate all information about this system
            $admin->tampilDashboard();
            break;
        case "data_polling":
            //open an interface for seeing polling data
            $admin->tahun_grafik = date("Y");
            $admin->bulan_tabel = date("F");
            $admin->bulan = date("n");
            $admin->tampilDataPolling();
            break;
        case "background":
            //open an interface for change the visitor background theme
            $admin->tampilBackground();
            break;
        case "running_text":
            //open an interface for change something, about what running text will be shown in the visitor interface
            $admin->tampilRunningText();
            break;
        case "konten_web":
            //open an interface for change content element, about what text will be shown in the visitor interface
            $admin->tampilKontenWeb();
            break;
    }
}
//action for saving an editing running text record to db
elseif (isset($_POST['btn_simpan_edit_rt'])) {
    $admin = new cn_admin();
    $admin->id_edit = $_POST['id'];
    $admin->informasi = $_POST['informasi'];
    $admin->editRunningText();
    $admin->tampilRunningText();
}
//action for delete some running text record from db
elseif (isset($_POST['btn_hapus_rt'])) {
    $admin = new cn_admin();
    $admin->id_hapus = $_POST['id'];
    $admin->hapusRunningText();
    $admin->tampilRunningText();
}
//action for adding new running text record to db
elseif (isset($_POST['btn_tambah_rt'])) {
    $admin = new cn_admin();
    $admin->informasi = $_POST['informasi'];
    $admin->tambahRunningText();
    $admin->tampilRunningText();
}
//action for seeing some graph in polling summaries
elseif (isset($_POST['btn_search_grafik'])) {
    $admin = new cn_admin();
    $admin->tahun_grafik = $_POST['selection_1'];
    $admin->bulan_tabel = date("F");
    $admin->bulan = date("n");
    $admin->tampilDataPolling();
}
//action for seeing polling detail at some month
elseif (isset($_POST['btn_search_tabel'])) {
    $admin = new cn_admin();
    $admin->tahun_grafik = $_POST['selection_2'];
    $admin->bulan_tabel = $_POST['selection_3'];
    $admin->bulan = date("n", strtotime($admin->bulan_tabel));
    $admin->tampilDataPolling();
}
//action for save polling detail into an excel file
elseif (isset($_POST['btn_simpan_excel'])) {
    $admin = new cn_admin();
    $admin->tahun_grafik = $_POST['tahun_simpan'];
    $admin->bulan_tabel = $_POST['bulan_simpan'];
    $admin->bulan = date("n", strtotime($admin->bulan_tabel));
    $admin->simpanExcel();
}
//action for activated visitor interface
elseif (isset($_POST['btn_set_aktif'])) {
    $admin = new cn_admin();
    $admin->id_set = $_POST['id'];
    $admin->setAktif();
}
//action for saving new background image for visitor interface
elseif (isset($_POST['btn_upload_image'])) {
    $admin = new cn_admin();
    $admin->uploadImage();
}
//action for edit location web content
elseif (isset($_POST['btn_tambah_kw_l'])) {
    $admin = new cn_admin();
    $text = $_POST['lokasi'] . "";
    $admin->editKontenWeb('lokasi', $text);
    $admin->tampilKontenWeb();
}
//action for edit title web content
elseif (isset($_POST['btn_tambah_kw_j'])) {
    $admin = new cn_admin();
    $text = $_POST['judul'] . "";
    $admin->editKontenWeb('judul', $text);
    $admin->tampilKontenWeb();
}
//action for edit sub title web content
elseif (isset($_POST['btn_tambah_kw_sj'])) {
    $admin = new cn_admin();
    $text = $_POST['subjudul'] . "";
    $admin->editKontenWeb('subjudul', $text);
    $admin->tampilKontenWeb();
}
//action for edit indicator web content
elseif (isset($_POST['btn_tambah_kw_idk'])) {
    $admin = new cn_admin();
    $text = $_POST['indikator'] . "";
    $admin->editKontenWeb('indikator', $text);
    $admin->tampilKontenWeb();
}
//action for edit detil of day record
elseif (isset($_POST['btn_detil_poling'])) {
    $admin = new cn_admin();
    $get = $_POST['date_detil'] . "";
    $date = strtotime($get);
    $parse = date("Y-m-d", $date);
    $admin->p_tp = $_POST['p_tp'];
    $admin->p_p = $_POST['p_p'];
    $admin->p_sp = $_POST['p_sp'];
    $admin->p_tot = $_POST['p_tot'];
    $admin->id_dmy = $parse;
    $admin->tampilDataPollingMng();
}
//action for add new record polling
elseif (isset($_POST['btn_mdp_tambah'])) {
    $admin = new cn_admin();
    $admin->date = $_POST['tanggal'];
    $admin->time = $_POST['time'];
    $admin->polling = $_POST['polling'];
    $admin->MDPTambah();
}
//action for edit record polling
elseif (isset($_POST['btn_mdp_edit'])) {
    $admin = new cn_admin();
    $admin->idpolling = $_POST['idpolling'];
    $admin->date = $_POST['tanggal'];
    $admin->time = $_POST['time'];
    $admin->polling = $_POST['polling'];
    $admin->lastpolling = $_POST['lastpolling'];

    $admin->MDPEdit();
}
//action for delete record polling
elseif (isset($_POST['btn_mdp_hapus'])) {
    $admin = new cn_admin();
    $admin->idpolling = $_POST['idpolling'];
    $admin->date = $_POST['tanggal'];
    $admin->polling = $_POST['polling'];

    $admin->MDPHapus();
}
//action for open dashboard interface when there is no specific ask
else {
    $admin = new cn_admin();
    $admin->tampilDashboard();
}

class cn_admin {

    public $en_polling;
    public $en_rekap;
    public $en_running_text;
    public $en_background;
    public $en_konten;
    public $id_hapus;
    public $id_edit;
    public $informasi;
    public $tahun_grafik;
    public $bulan_tabel;
    public $bulan;
    public $id_set;
    public $id_dmy;
    public $p_tp;
    public $p_p;
    public $p_sp;
    public $p_tot;
    public $idpolling;
    public $date;
    public $time;
    public $polling;
    public $lastpolling;

    function __construct() {
        $this->en_polling = new en_polling();
        $this->en_rekap = new en_rekap();
        $this->en_running_text = new en_running_text();
        $this->en_background = new en_background();
        $this->en_konten = new en_konten();
    }

    //upload image
    function uploadImage() {
        $data_background = $this->en_background->getData("user upload");
        $count_data_background = mysqli_num_rows($data_background);

        $target_dir = "images/background/";
        $target_temp = $target_dir . basename($_FILES["input-file-preview"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_temp, PATHINFO_EXTENSION);
        $target_file = $target_dir . "user_upload." . $imageFileType;

        //Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        } else {
            if ($count_data_background != 0) {
                $data_background_jadi = mysqli_fetch_array($data_background);
                chmod($data_background_jadi[0], 0755);
                unlink($data_background_jadi[0]);
                $this->en_background->deleteData("user upload");
            }
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["input-file-preview"]["tmp_name"], $target_file)) {
                echo "The file $target_file has been uploaded.";
                $this->en_background->nama = $_POST['judul_nya'];
                $this->en_background->path = "$target_file";
                $this->en_background->kategori = "user upload";
                $this->en_background->updateData("all");
                $this->en_background->stats = "aktif";

                $this->en_background->insertData();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        header("location:cn_admin.php?id=background");
    }

    //activated visitor interface
    function setAktif() {
        $this->en_background->id = $this->id_set;
        $this->en_background->updateData("all");
        $this->en_background->updateData("aktif");
        $this->tampilBackground();
    }

    //editing running text record
    function editRunningText() {
        $this->en_running_text->id = $this->id_edit;
        $this->en_running_text->informasi = $this->informasi;
        $this->en_running_text->updateData();
    }

    //deleting running text record
    function hapusRunningText() {
        $this->en_running_text->id = $this->id_hapus;
        $this->en_running_text->deleteData();
    }

    //adding new running text record
    function tambahRunningText() {
        $this->en_running_text->informasi = $this->informasi;
        $this->en_running_text->insertData();
    }

    //display dashboard interface
    function tampilDashboard() {
        $this->en_rekap->tanggal = date("j");
        $this->en_rekap->bulan = date("n");
        $this->en_rekap->tahun = date("Y");

        $data_background = $this->en_background->getData("dashboard");
        $count_data_background = mysqli_num_rows($data_background);

        $data_rekap = $this->en_rekap->getData("rekap");
        $count_data_rekap = mysqli_num_rows($data_rekap);
        if ($count_data_rekap != 0) {
            $data_rekap_jadi = mysqli_fetch_array($data_rekap);
        } else {
            $data_rekap_jadi[0] = $data_rekap_jadi[1] = $data_rekap_jadi[2] = 0;
        }

        $data_running_text = $this->en_running_text->getData("tampil");
        $count_data_running_text = mysqli_num_rows($data_running_text);

        $lokasi_cetak = "";
        $q_sql = $this->en_konten->getLokasi();
        if (mysqli_num_rows($q_sql) != 0) {
            $r_sql = mysqli_fetch_array($q_sql);
            $lokasi_cetak = $r_sql[0];
        }

        include_once './bn_dashboard.php';
    }

    //saving record into excel file ".xls"
    function simpanExcel() {
        //Menentukan Bulan
        $bulan = $this->bulan_tabel;
        $tahun = $this->tahun_grafik;
        $bulan_angka = date("n", strtotime($this->bulan_tabel));

        $this->en_rekap->bulan = $this->bulan;
        $this->en_rekap->tahun = $this->tahun_grafik;

        $data_polling_simpan = $this->en_rekap->getData("bulanan");
        $count_data_polling_simpan = mysqli_num_rows($data_polling_simpan);

        if ($count_data_polling_simpan != 0) {
            $data_polling_simpan_jadi = mysqli_fetch_array($data_polling_simpan);
        } else {
            $data_polling_simpan_jadi[0] = 0;
        }

        $max_date = 0;
        switch ($bulan_angka) {
            case "1": $max_date = 31;
                break;
            case "2":
                $kabisat = ($tahun % 4 == 0) ? "True" : "False";
                if ($kabisat == "True") {
                    $max_date = 29;
                } else {
                    $max_date = 28;
                }
                break;
            case "3":$max_date = 31;
                break;
            case "4":$max_date = 30;
                break;
            case "5":$max_date = 31;
                break;
            case "6":$max_date = 30;
                break;
            case "7":$max_date = 31;
                break;
            case "8":$max_date = 31;
                break;
            case "9":$max_date = 30;
                break;
            case "10":$max_date = 31;
                break;
            case "11":$max_date = 30;
                break;
            case "12":$max_date = 31;
                break;
        }

        $exporter = new ExportDataExcel('browser', "RekapPolling_$bulan$tahun.xls");
        $exporter->initialize();
        $exporter->addRow(array("Rekap data polling kepuasan pelanggan Perpustakaan BPS Jawa Timur $bulan $tahun")); //judul
        $exporter->addRow(array(""));
        $exporter->addRow(array("Tanggal", "Tidak Puas", "Puas", "Sangat Puas"));

        $tanggal = 0;
        for ($i = 0; $i < $max_date; $i++) {
            $tanggal++;
            if ($data_polling_simpan_jadi[0] == $tanggal) {
                $exporter->addRow(array("$tanggal-$bulan-$tahun", "$data_polling_simpan_jadi[3]", "$data_polling_simpan_jadi[4]", "$data_polling_simpan_jadi[5]"));
                $data_polling_simpan_jadi = mysqli_fetch_array($data_polling_simpan);
            } else {
                $exporter->addRow(array("$tanggal-$bulan-$tahun", "-", "-", "-"));
            }
        }
        $exporter->addRow(array("$tanggal-$bulan-$tahun", "-", "-", "-"));
        $exporter->finalize(); // writes the footer, flushes remaining data to browser.
    }

    //display polling record interface all year
    function tampilDataPolling() {
        $tahun_grafik = $this->tahun_grafik;
        $bulan_tabel = $this->bulan_tabel;
        $bulan = $this->bulan;

        $this->en_rekap->bulan = $this->bulan;
        $this->en_rekap->tahun = $this->tahun_grafik;
//------------------------------------------------------------------------------
        $tahun_exist_grafik = $this->en_rekap->getData("tahunexist");
        $count_tahun_exist_grafik = mysqli_num_rows($tahun_exist_grafik);

        $data_polling_tahunan = $this->en_rekap->getData("tahunan");
        $count_data_polling_tahunan = mysqli_num_rows($data_polling_tahunan);
        if ($count_data_polling_tahunan != 0) {
            $data_polling_tahunan_jadi = mysqli_fetch_array($data_polling_tahunan);
        } else {
            $data_polling_tahunan_jadi[0] = 0;
        }

        $tahun_exist_bulan = $this->en_rekap->getData("tahunexist");
        $count_tahun_exist_bulan = mysqli_num_rows($tahun_exist_bulan);

        $data_polling_bulanan = $this->en_rekap->getData("bulanan");
        $count_data_polling_bulanan = mysqli_num_rows($data_polling_bulanan);
        if ($count_data_polling_bulanan != 0) {
            $data_polling_bulanan_jadi = mysqli_fetch_array($data_polling_bulanan);
        } else {
            $data_polling_bulanan_jadi[0] = 0;
        }
//------------------------------------------------------------------------------
        $dr_bulan = $this->en_rekap->getData("bulanan_1");
        if (mysqli_num_rows($dr_bulan) == 0) {
            $dj_bulan[0] = $dj_bulan[1] = $dj_bulan[2] = $persen_tp_bulan = $persen_p_bulan = $persen_sp_bulan = 0;
            $dj_bulan[3] = $dj_bulan[0] + $dj_bulan[1] + $dj_bulan[2];
        } else {
            $dj_bulan = mysqli_fetch_array($dr_bulan);
            if (($dj_bulan[0] + $dj_bulan[1] + $dj_bulan[2]) == 0) {
                $persen_tp_bulan = 0;
                $persen_p_bulan = 0;
                $persen_sp_bulan = 0;
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

        $lokasi_cetak = "";
        $q_sql = $this->en_konten->getLokasi();
        if (mysqli_num_rows($q_sql) != 0) {
            $r_sql = mysqli_fetch_array($q_sql);
            $lokasi_cetak = $r_sql[0];
        }

        include_once './bn_data_poling.php';
    }

    //display background interface
    function tampilBackground() {
        $data_background = $this->en_background->getData("semua");
        $count_data_background = mysqli_num_rows($data_background);
        if ($count_data_background != 0) {
            $data_background_jadi = mysqli_fetch_array($data_background);
        }

        $data_background_aktif = $this->en_background->getData("aktif");
        $count_data_background_aktif = mysqli_num_rows($data_background_aktif);
        if ($count_data_background_aktif != 0) {
            $data_background_aktif_jadi = mysqli_fetch_array($data_background_aktif);
        }

        $lokasi_cetak = "";
        $q_sql = $this->en_konten->getLokasi();
        if (mysqli_num_rows($q_sql) != 0) {
            $r_sql = mysqli_fetch_array($q_sql);
            $lokasi_cetak = $r_sql[0];
        }

        include_once './bn_background.php';
    }

    //display running text interface
    function tampilRunningText() {
        $data_running_text = $this->en_running_text->getData("tabel");
        $count_data_running_text = mysqli_num_rows($data_running_text);

        $data_running_text_modal = $this->en_running_text->getData("tabel");
        $count_data_running_text_modal = mysqli_num_rows($data_running_text_modal);

        $lokasi_cetak = "";
        $q_sql = $this->en_konten->getLokasi();
        if (mysqli_num_rows($q_sql) != 0) {
            $r_sql = mysqli_fetch_array($q_sql);
            $lokasi_cetak = $r_sql[0];
        }

        include_once './bn_running_text.php';
    }

    function tampilKontenWeb() {
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

        $lokasi_cetak = "";
        $q_sql = $this->en_konten->getLokasi();
        if (mysqli_num_rows($q_sql) != 0) {
            $r_sql = mysqli_fetch_array($q_sql);
            $lokasi_cetak = $r_sql[0];
        }

        include_once './bn_konten_web.php';
    }

    function editKontenWeb($tipe, $text) {
        $this->en_konten->type = $tipe;
        $this->en_konten->text = $text;

        $this->en_konten->updateData();
    }

    function tampilDataPollingMng() {
        $this->en_polling->id_dmy = $this->id_dmy;
        $detil = $this->en_polling->getData();

        $detil_modal = $this->en_polling->getData();

        //bulan string
        $p = strtotime($this->id_dmy);
        $date_get = date("j F Y", $p);

        //bulan angka
        $date_rekap = $this->id_dmy;

        $p_tp = $this->p_tp;
        $p_p = $this->p_p;
        $p_sp = $this->p_sp;
        $p_tot = $this->p_tot;

        $lokasi_cetak = "";
        $q_sql = $this->en_konten->getLokasi();
        if (mysqli_num_rows($q_sql) != 0) {
            $r_sql = mysqli_fetch_array($q_sql);
            $lokasi_cetak = $r_sql[0];
        }

        include_once './bn_data_poling_mng.php';
    }

    function MDPTambah() {
        $date = $this->date;
        $time = $this->time;
        $polling = $this->polling;
        $timestamp = $date . " " . $time . ":00";

        $this->en_polling->polling = $polling;
        $this->en_polling->waktu = $timestamp;
        $this->en_polling->insertDataMDP();

        $p = strtotime($date);
        $date_trn = date("j-n-Y", $p);
        $explode = explode("-", $date_trn);

        // pengisian tabel rekap
        $this->en_rekap->tanggal = $explode[0];
        $this->en_rekap->bulan = $explode[1];
        $this->en_rekap->tahun = $explode[2];

        if ($polling == 'tidak puas') {
            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('0');
            } else {
                $get = $this->en_rekap->getData("tidakpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("0", $numnow);
            }
        } elseif ($polling == 'puas') {
            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('1');
            } else {
                $get = $this->en_rekap->getData("puas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("1", $numnow);
            }
        } elseif ($polling == 'sangat puas') {
            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('2');
            } else {
                $get = $this->en_rekap->getData("sangatpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("2", $numnow);
            }
        }
        header('location:cn_admin.php?id=data_polling');
    }

    function MDPEdit() {
        $idpolling = $this->idpolling;
        $date = $this->date;
        $time = $this->time;
        $polling = $this->polling;
        $lastpolling = $this->lastpolling;

        $this->en_polling->idpolling = $idpolling;
        $this->en_polling->waktu = $date . " " . $time . ":00";
        $this->en_polling->polling = $polling;

        $this->en_polling->updateData();

        $p = strtotime($date);
        $date_trn = date("j-n-Y", $p);
        $explode = explode("-", $date_trn);

        // pengisian tabel rekap
        $this->en_rekap->tanggal = $explode[0];
        $this->en_rekap->bulan = $explode[1];
        $this->en_rekap->tahun = $explode[2];

        if ($polling == 'tidak puas') {
            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('0');
            } else {
                $get = $this->en_rekap->getData("tidakpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("0", $numnow);
            }
        } elseif ($polling == 'puas') {
            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('1');
            } else {
                $get = $this->en_rekap->getData("puas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("1", $numnow);
            }
        } elseif ($polling == 'sangat puas') {
            if ($this->en_rekap->getData("cek") == 0) {
                $this->en_rekap->insertData('2');
            } else {
                $get = $this->en_rekap->getData("sangatpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] + 1;
                $this->en_rekap->updateData("2", $numnow);
            }
        }

        if ($lastpolling == 'tidak puas') {
            if ($this->en_rekap->getData("cek") != 0) {
                $get = $this->en_rekap->getData("tidakpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] - 1;
                $this->en_rekap->updateData("0", $numnow);
            }
        } elseif ($lastpolling == 'puas') {
            if ($this->en_rekap->getData("cek") != 0) {
                $get = $this->en_rekap->getData("puas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] - 1;
                $this->en_rekap->updateData("1", $numnow);
            }
        } elseif ($lastpolling == 'sangat puas') {
            if ($this->en_rekap->getData("cek") != 0) {
                $get = $this->en_rekap->getData("sangatpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] - 1;
                $this->en_rekap->updateData("2", $numnow);
            }
        }
        header('location:cn_admin.php?id=data_polling');
    }

    function MDPHapus() {
        $idpolling = $this->idpolling;
        $date = $this->date;
        $polling = $this->polling;

        $this->en_polling->idpolling = $idpolling;

        $this->en_polling->deleteData();

        $p = strtotime($date);
        $date_trn = date("j-n-Y", $p);
        $explode = explode("-", $date_trn);

        // pengisian tabel rekap
        $this->en_rekap->tanggal = $explode[0];
        $this->en_rekap->bulan = $explode[1];
        $this->en_rekap->tahun = $explode[2];

        if ($polling == 'tidak puas') {
            if ($this->en_rekap->getData("cek") != 0) {
                $get = $this->en_rekap->getData("tidakpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] - 1;
                $this->en_rekap->updateData("0", $numnow);
            }
        } elseif ($polling == 'puas') {
            if ($this->en_rekap->getData("cek") != 0) {
                $get = $this->en_rekap->getData("puas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] - 1;
                $this->en_rekap->updateData("1", $numnow);
            }
        } elseif ($polling == 'sangat puas') {
            if ($this->en_rekap->getData("cek") != 0) {
                $get = $this->en_rekap->getData("sangatpuas");
                $fetch = mysqli_fetch_array($get);
                $numnow = $fetch[0] - 1;
                $this->en_rekap->updateData("2", $numnow);
            }
        }


        header('location:cn_admin.php?id=data_polling');
    }

}
