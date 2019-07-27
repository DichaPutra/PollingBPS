<?php
require_once 'fpdf.php';
include_once './database.php';
//$conn = mysqli_connect('localhost', 'root', '');
//if ($conn) {
//    $select_db = mysql_select_db('polling');
//    if (!$select_db) {
//        echo"<script>alert('Gagal koneksi ke database. Database tidak ada.');</script>";
//    }
//} else {
//    echo"<script>alert('Gagal koneksi ke server. Server tidak ada.');</script>";
//}
if (empty($_POST['bulan_simpan'])) {
    header('location:cn_admin.php   ');
}
 
$bulan = $_POST['bulan_simpan'];
$tahun = $_POST['tahun_simpan'];
$bulan_angka = date("n", strtotime($bulan));

$month_ina = "";
switch ($bulan) {
    case "January":$month_ina = "Januari";
        break;
    case "February": $month_ina = "Februari";
        break;
    case "March":$month_ina = "Maret";
        break;
    case "April":$month_ina = "April";
        break;
    case "May": $month_ina = "Mei";
        break;
    case "June": $month_ina = "Juni";
        break;
    case "July": $month_ina = "Juli";
        break;
    case "August": $month_ina = "Agustus";
        break;
    case "September": $month_ina = "September";
        break;
    case "October": $month_ina = "Oktober";
        break;
    case "November": $month_ina = "November";
        break;
    case "December": $month_ina = "Desember";
        break;
}


$s_sql = "select text from konten where type = 'lokasi'";
$q_sql = mysqli_query($GLOBALS['conn'],$s_sql);
$lokasi = "";
if (mysqli_num_rows($q_sql) != 0) {
    $r_sql = mysqli_fetch_array($q_sql);
    $lokasi = $r_sql[0];
}
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial", "B", "12");
$pdf->Image('logopdf.png', 8, 15, 25, 20);
$pdf->SetFont("Arial", "B", "13");
$pdf->Text(36, 20, 'Rekap Polling Data Kepuasan Pengunjung PST (Pelayanan Statistik Terpadu)'); //judul 2 baris
$pdf->Text(36, 26, "Badan Pusat Statistik $lokasi");
$pdf->SetFont("Arial", "", "9");
$pdf->Cell(91, 40, "Bulan $month_ina Tahun $tahun", 0, 1, 'C');
$pdf->Line(0, 0, 0, 0);
$pdf->Cell(0, 0, ' ', 0, 1, 'C');

$pdf->SetFont("Arial", "B", "10");
$pdf->Cell(50, 8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(35, 8, 'Tidak Puas', 1, 0, 'C');
$pdf->Cell(35, 8, 'Puas', 1, 0, 'C');
$pdf->Cell(35, 8, 'Sangat Puas', 1, 0, 'C');
$pdf->Cell(35, 8, 'Total', 1, 1, 'C');

$pdf->SetFont("Arial", "", "10");

$string_query = "select tanggal, bulan, tahun, tidakpuas, puas, sangatpuas, (tidakpuas + puas + sangatpuas) as jumlah from rekap where bulan = $bulan_angka and tahun = $tahun";
$data_polling_simpan = mysqli_query($GLOBALS['conn'],$string_query);
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

$tanggal = 0;
$t_tp = $t_p = $t_sp = $t_tot = 0;
for ($i = 0; $i <= $max_date; $i++) {
    $tanggal = $tanggal + 1;
    if ($data_polling_simpan_jadi[0] == $tanggal) {
        $pdf->Cell(50, 6.5, "$data_polling_simpan_jadi[0] - $data_polling_simpan_jadi[1] - $data_polling_simpan_jadi[2]", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "$data_polling_simpan_jadi[3]", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "$data_polling_simpan_jadi[4]", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "$data_polling_simpan_jadi[5]", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "$data_polling_simpan_jadi[6]", 1, 1, 'C');

        $t_tp += $data_polling_simpan_jadi[3];
        $t_p += $data_polling_simpan_jadi[4];
        $t_sp += $data_polling_simpan_jadi[5];
        $t_tot += $data_polling_simpan_jadi[6];

        $data_polling_simpan_jadi = mysqli_fetch_array($data_polling_simpan);
    } else {
        $pdf->Cell(50, 6.5, "$tanggal - $bulan_angka - $tahun", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "-", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "-", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "-", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "-", 1, 1, 'C');
    }
    if ($i == $max_date) {
        $pdf->Cell(50, 6.5, "Total Keseluruhan", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "$t_tp", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "$t_p", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "$t_sp", 1, 0, 'C');
        $pdf->Cell(35, 6.5, "$t_tot", 1, 0, 'C');
    }
}
$pdf->Output();
?>